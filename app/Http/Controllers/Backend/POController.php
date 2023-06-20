<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Produk;
use App\Models\Produk_Supplier;
use App\Models\Supplier;
use App\Models\Purchase_Order;
use App\Models\Po_Produk;
use DataTables;

class POController extends Controller
{
    public function getPO(Request $request,$id) {
        $data   = Supplier::join("purchase_order","purchase_order.id_supplier","=","supplier.id_supplier")
        ->where("id_produk_supplier",$id)
        ->get();
        return $data;
    }
    public function datatable(Request $request) {
        $data   = Supplier::join("purchase_order","purchase_order.id_supplier","=","supplier.id_supplier")->get();
        return DataTables::of($data)->make(true);
    }
    public function insertPO(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'id_supplier' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){

            $count_po_today   = Purchase_Order::where(\DB::raw("DATE(tanggal_po)"),date("Y-m-d"))
            ->select(\DB::raw("COUNT(id_po) as total"),\DB::raw("MAX(nomor_po) as max_nomor_po"))
            ->first();
            if(empty($count_po_today->total)){
                $nomor_po  = "PO".date("Ymd")."0000001";
            }else{
                $old_nomor_po  = $count_po_today->max_nomor_po;
                $c  = 0;
                do{
                    $nomor_po  = "PO".date("Ymd");
                    $substr         = substr($old_nomor_po,9);
                    $next_invoice   = intval($substr) + 1;
                    for($i = strlen($next_invoice); $i < 7;$i++){
                        $nomor_po  .= "0";
                    }
                    $nomor_po  .= $next_invoice;
                    $check_nomor_po    = Purchase_Order::where("nomor_po",$nomor_po)->first();

                    $old_nomor_po  = $nomor_po;
                    $c++;
                }while(!empty($check_nomor_po));
            }
            
            $po   = new Purchase_order;
            $po->id_supplier    = $request->id_supplier;
            $po->nomor_po       = $nomor_po;
            $po->tanggal_po     = date("Y-m-d H:i:s");
    
            if($po->save()){

                $status     = "success";
                $message    = "Purchase Order berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Purchase Order gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }

    public function updatePO(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $po   = Purchase_Order::find($id);
        $action     = !empty($request->action) ? $request->action : "kirim";

        if(!$validation_error){
            $detail_po  = Po_Produk::where("id_po",$id)->first();
            if(empty($detail_po)){
                $status     = "error";
                $message    = "Masukkan Produk terlebih dahulu";
                $validation_error   = true;
            }
        }

        if(!$validation_error){
            if($action == "kirim" && !empty($po->tanggal_pengiriman)){
                $status     = "error";
                $message    = "PO Sudah Dikirim";
                $validation_error   = true;
            }elseif($action == "terima" && !empty($po->tanggal_penerimaan)){
                $status     = "error";
                $message    = "PO Sudah Diterima";
                $validation_error   = true;
            }
        }


        if (!$validation_error){
            if($action == "kirim"){
                $po->tanggal_pengiriman = date("Y-m-d H:i:s");
            }else if($action == "terima"){
                $po->tanggal_penerimaan = date("Y-m-d H:i:s");
            }
    
            if($po->save()){              
                $status     = "success";
                
                if($action == "kirim"){
                    $message    = "PO telah dikirim";
                }else if($action == "terima"){
                    $message    = "PO telah diterima";
                }
            }else{
                $status     = "error";
                $message    = "PO gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    
    public function deletePO(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $po   = Purchase_Order::find($id);
            if($po->delete()){

                $status     = "success";
                $message    = "PO berhasil dihapus";
            }else{
                $status     = "error";
                $message    = "PO gagal dihapus";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }

    public function getProduct(Request $request,$id_po_produk)
    {
        $data   = Po_Produk::find($id_po_produk);
        return $data;
    }

    public function getManyProduct(Request $request)
    {
        $po     = Purchase_Order::find($request->id_po);
        $data   = Produk_Supplier::with(["produk"])->where("id_supplier",$po->id_supplier)->get();
        return $data;
    }
    
    public function datatableProduct(Request $request)
    {
        $data   = Po_Produk::join("produk","produk.id_produk","=","po_produk.id_produk")
        ->where("id_po",$request->id_po)
        ->get();
        return DataTables::of($data)->make(true);
    }

    public function insertProduct(Request $request,$id_po)
    {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'id_produk' => ['required'],
            'qty_produk' => ['required','numeric',"min:1"],
            'harga_satuan' => ['required','numeric',"min:1"],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $po_product   = new PO_Produk;
            $po_product->id_po          = $id_po;
            $po_product->id_produk      = $request->id_produk;
            $po_product->qty_produk     = $request->qty_produk;
            $po_product->harga_satuan   = $request->harga_satuan;
    
            if($po_product->save()){

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

    public function updateProduct(Request $request,$id_po_produk)
    {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'id_produk' => ['required'],
            'qty_produk' => ['required','numeric',"min:1"],
            'harga_satuan' => ['required','numeric',"min:1"],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $po_product   = PO_Produk::find($id_po_produk);
            $po_product->id_produk      = $request->id_produk;
            $po_product->qty_produk     = $request->qty_produk;
            $po_product->harga_satuan   = $request->harga_satuan;
    
            if($po_product->save()){

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

    public function deleteProduct(Request $request,$id_po_produk) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $po_product   = Po_Produk::find($id_po_produk);
            if($po_product->delete()){
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
