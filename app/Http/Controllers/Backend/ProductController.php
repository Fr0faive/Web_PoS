<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Produk;
use App\Models\Produk_Supplier;
use DataTables;

class ProductController extends Controller
{
    public function getProduct(Request $request,$id) {
        $data   = Produk::with("produk_supplier")->find($id);
        return $data;
    }
    public function datatable(Request $request) {
        $data   = Produk::with("produk_supplier.supplier","produk_kategori")->get();
        return DataTables::of($data)->make(true);
    }
    public function insertProduct(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'barcode' => ['required'],
            'harga' => ['required','numeric','min:1'],
            'id_produk_kategori' => ['required'],
            'id_supplier' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if(!$validation_error){
            $check_product  = Produk::where("barcode" , $request->barcode)->first();
            if(!empty($check_product)){
                $status     = "error";
                $message    = "Barcode telah terdaftar";
                $validation_error   = true;
            }
        }

        if (!$validation_error){
            
            $product   = new Produk;
            $product->nama_produk = $request->nama_produk;
            $product->barcode = $request->barcode;
            $product->harga = $request->harga;
            $product->stok = 0;
            $product->id_produk_kategori = $request->id_produk_kategori;
    
            if($product->save()){

                $product_supplier   = new Produk_Supplier;
                $product_supplier->id_produk = $product->id_produk;
                $product_supplier->id_supplier = $request->id_supplier;
                $product_supplier->save();
                
                $status     = "success";
                $message    = "Produk berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Produk gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function updateProduct(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'barcode' => ['required'],
            'harga' => ['required','numeric','min:1'],
            'id_produk_kategori' => ['required'],
            'id_supplier' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if(!$validation_error){
            $check_product  = Produk::where("barcode",$request->barcode)
            ->where("id_produk","!=",$id)
            ->first();
            if(!empty($check_product)){
                $status     = "error";
                $message    = "Barcode telah terdaftar";
                $validation_error   = true;
            }
        }

        if (!$validation_error){
            
            $product   = Produk::find($id);
            $product->nama_produk = $request->nama_produk;
            $product->barcode = $request->barcode;
            $product->harga = $request->harga;
            $product->id_produk_kategori = $request->id_produk_kategori;
    
            if($product->save()){

                $product_supplier   = Produk_Supplier::where([
                    "id_produk" => $product->id_produk
                ])->first();
                $product_supplier->id_supplier = $request->id_supplier;
                $product_supplier->save();
                

                $status     = "success";
                $message    = "Produk berhasil diupdate";
            }else{
                $status     = "error";
                $message    = "Produk gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function deleteProduct(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $product   = Produk::find($id);
    
            if($product->delete()){
                $product_supplier   = Produk_Supplier::where([
                    "id_produk" => $product->id_produk
                ])->delete();

                $status     = "success";
                $message    = "Produk berhasil dihapus";
            }else{
                $status     = "error";
                $message    = "Produk gagal dihapus";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
