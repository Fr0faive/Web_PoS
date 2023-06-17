<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Supplier;
use DataTables;

class SupplierController extends Controller
{
    public function getSupplier(Request $request,$id) {
        $data   = Supplier::find($id);
        return $data;
    }
    public function datatable(Request $request) {
        $data   = Supplier::get();
        return DataTables::of($data)->make(true);
    }
    public function insertSupplier(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $status             = "";
        $message            = "";
        $validation_error   = false;
        
        $validator = Validator::make($request->all(), [
            'nama_supplier' => ['required'],
            'alamat' => ['required'],
            'kontak' => ['required','numeric'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $supplier   = new Supplier;
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->alamat = $request->alamat;
            $supplier->kontak = $request->kontak;
    
            if($supplier->save()){
                $status     = "success";
                $message    = "Supplier berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Supplier gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function updateSupplier(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nama_supplier' => ['required'],
            'alamat' => ['required'],
            'kontak' => ['required','numeric'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $supplier   = Supplier::find($id);
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->alamat = $request->alamat;
            $supplier->kontak = $request->kontak;
    
            if($supplier->save()){
                $status     = "success";
                $message    = "Supplier berhasil diupdate";
            }else{
                $status     = "error";
                $message    = "Supplier gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function deleteSupplier(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $supplier   = Supplier::find($id);
    
            if($supplier->delete()){
                $status     = "success";
                $message    = "Supplier berhasil dihapus";
            }else{
                $status     = "error";
                $message    = "Supplier gagal dihapus";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
