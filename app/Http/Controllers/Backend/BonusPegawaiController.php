<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Bonus_Pegawai;
use DataTables;

class BonusPegawaiController extends Controller
{
    public function getBonusPegawai(Request $request,$id) {
        $data   = Bonus_Pegawai::find($id);
        return $data;
    }
    public function datatable(Request $request) {
        $id_pegawai     = $request->id_pegawai;
        $data   = Bonus_Pegawai::with("jenis_bonus")
        ->where("id_pegawai",$id_pegawai)
        ->get();
        return DataTables::of($data)->make(true);
    }
    public function insertBonusPegawai(Request $request,$id_pegawai) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $status             = "";
        $message            = "";
        $validation_error   = false;
        
        $validator = Validator::make($request->all(), [
            'id_jenis_bonus' => ['required'],
            'jumlah_bonus' => ['required','numeric'],
            'bulan' => ['required','numeric'],
            'tahun' => ['required','numeric'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $supplier   = new Bonus_Pegawai;
            $supplier->id_pegawai = $id_pegawai;
            $supplier->id_jenis_bonus = $request->id_jenis_bonus;
            $supplier->jumlah_bonus = $request->jumlah_bonus;
            $supplier->bulan = $request->bulan;
            $supplier->tahun = $request->tahun;
    
            if($supplier->save()){
                $status     = "success";
                $message    = "Bonus berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Bonus gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function updateBonusPegawai(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'id_jenis_bonus' => ['required'],
            'jumlah_bonus' => ['required','numeric'],
            'bulan' => ['required','numeric'],
            'tahun' => ['required','numeric'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }

        if (!$validation_error){
            
            $supplier   = Bonus_Pegawai::find($id);
            $supplier->id_jenis_bonus = $request->id_jenis_bonus;
            $supplier->jumlah_bonus = $request->jumlah_bonus;
            $supplier->bulan = $request->bulan;
            $supplier->tahun = $request->tahun;
    
            if($supplier->save()){
                $status     = "success";
                $message    = "Bonus berhasil diupdate";
            }else{
                $status     = "error";
                $message    = "Bonus gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function deleteBonusPegawai(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $supplier   = Bonus_Pegawai::find($id);
    
            if($supplier->delete()){
                $status     = "success";
                $message    = "Bonus berhasil dihapus";
            }else{
                $status     = "error";
                $message    = "Bonus gagal dihapus";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
