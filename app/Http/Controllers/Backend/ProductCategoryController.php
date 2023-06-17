<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Produk_Kategori;
use DataTables;

class ProductCategoryController extends Controller
{
    public function getProductCategory(Request $request,$id) {
        $data   = Produk_Kategori::find($id);
        return $data;
    }
    public function datatable(Request $request) {
        $data   = Produk_Kategori::get();
        return DataTables::of($data)->make(true);
    }
    public function insertProductCategory(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nama_produk_kategori' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $productCategory   = new Produk_Kategori;
            $productCategory->nama_produk_kategori = $request->nama_produk_kategori;
    
            if($productCategory->save()){
                $status     = "success";
                $message    = "Produk kategori berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Produk kategori gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function updateProductCategory(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nama_produk_kategori' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $productCategory   = Produk_Kategori::find($id);
            $productCategory->nama_produk_kategori = $request->nama_produk_kategori;
    
            if($productCategory->save()){
                $status     = "success";
                $message    = "Produk kategori berhasil diupdate";
            }else{
                $status     = "error";
                $message    = "Produk kategori gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function deleteProductCategory(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $productCategory   = Produk_Kategori::find($id);
            
            try {
                if($productCategory->delete()){
                    $status     = "success";
                    $message    = "Produk kategori berhasil dihapus";
                }else{
                    $status     = "error";
                    $message    = "Produk kategori gagal dihapus";
                }
            } catch (\Throwable $th) {
                $status     = "error";
                $message    = "Produk kategori gagal dihapus";
            }
            
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
