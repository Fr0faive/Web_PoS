<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Penjualan;
use App\Models\Detail_Penjualan;
use App\Models\Produk;
use DataTables;

class PenjualanController extends Controller
{
    public function getSupplier(Request $request,$id) {
        $data   = Penjualan::find($id);
        return $data;
    }
    public function datatable(Request $request) {
        if(Auth::guard("admin")->check()){
            $data   = Penjualan::all();
        }else{
            $id_pegawai     = \AppHelper::userLogin()->id_pegawai;
            $data   = Penjualan::where("id_pegawai",$id_pegawai)->get();
        }
        return DataTables::of($data)->make(true);
    }
    public function insertPenjualan(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;
        
        $validator = Validator::make($request->all(), [
            'product' => ['required','array'],
            'product.*' => ['required','numeric'],
            'bayar' => ['required','numeric'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if(!$validation_error){
            $products   = $request->product;
            $total_harga      = 0;
            $id_product_arr     = [];
            $detail_produk_arr  = [];
            foreach($products as $id_product => $qty_product){
                $id_product_arr[]   = $id_product;
            }

            $get_products   = Produk::whereIn("id_produk",$id_product_arr)->get();


            foreach ($get_products as $product) {
                $qty   = !empty($products[$product->id_produk]) ? intval($products[$product->id_produk]) : 0;
                if($qty > 0){
                    if($qty > $product->stok){
                        $status     = "error";
                        $message    = "Stok ". $product->nama_produk . " kurang! Tinggal ".$product->stok;
                        $validation_error   = true;
                    }else{
                        $total_harga   += $product->harga;

                        $detail_produk_arr[]    = [
                            "id_produk"     => $product->id_produk,
                            "qty_produk"     => $qty,
                            "harga_satuan"     => $product->harga,
                        ];
                    }
                }
            }
        }


        if(!$validation_error){
            if($request->bayar < $total_harga){
                $status     = "error";
                $message    = "Bayarnya Kurang! ";
                $validation_error   = true;
            }
        }
        
        if (!$validation_error){
            $id_pegawai     = \AppHelper::userLogin()->id_pegawai;

            $count_penjualan_today   = Penjualan::where(\DB::raw("DATE(tanggal_penjualan)"),date("Y-m-d"))
            ->select(\DB::raw("COUNT(id_penjualan) as total"),\DB::raw("MAX(nomor_invoice) as max_nomor_invoice"))
            ->first();
            if(empty($count_penjualan_today->total)){
                $nomor_invoice  = date("Ymd")."0000001";
            }else{
                $nomor_invoice  = date("Ymd");
                $substr         = substr($count_penjualan_today->max_nomor_invoice,7);
                $next_invoice   = intval($substr) + 1;
                for($i = strlen($next_invoice); $i < 7;$i++){
                    $nomor_invoice  .= "0";
                }
                $nomor_invoice  .= $next_invoice;
            }

            $penjualan   = new Penjualan;
            $penjualan->tanggal_penjualan = date("Y-m-d H:i:s");
            $penjualan->nomor_invoice = $nomor_invoice;
            $penjualan->id_pegawai = $id_pegawai;
            $penjualan->total_harga = $total_harga;
            $penjualan->bayar = $request->bayar;
            $penjualan->kembali = $penjualan->bayar - $penjualan->total;
    
            if($penjualan->save()){

                foreach($detail_produk_arr as $key => $detail){
                    $detail_produk_arr[$key]["id_penjualan"]   = $penjualan->id_penjualan;
                }

                Detail_Penjualan::insert($detail_produk_arr);

                foreach ($get_products as $product) {
                    $qty   = !empty($products[$product->id_produk]) ? intval($products[$product->id_produk]) : 0;
                    if($qty > 0){
                        if(!($qty > $product->stok)){
                            $produk     = Produk::find($product->id_produk);
                            $produk->stok   -= $qty;
                            $produk->save();
                        }
                    }
                }

                $status     = "success";
                $message    = "Data berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Data gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
