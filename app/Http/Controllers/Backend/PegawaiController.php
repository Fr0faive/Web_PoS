<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Pegawai;
use DataTables;

class PegawaiController extends Controller
{
    public function getPegawai(Request $request,$id) {
        $data   = Pegawai::select("id_pegawai","id_jabatan","nama_pegawai","nomor_pegawai")->where("id_pegawai",$id)->first();
        return $data;
    }
    public function datatable(Request $request) {
        $data   = Pegawai::with("jabatan")->select("id_pegawai","id_jabatan","nama_pegawai","nomor_pegawai")->get();
        return DataTables::of($data)->make(true);
    }
    public function insertPegawai(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $pegawai   = new Pegawai;
            $pegawai->id_jabatan = 2; // kasir
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nomor_pegawai = $request->nomor_pegawai;
            $pegawai->password_akun = \Hash::make($request->password_akun);
    
            if($pegawai->save()){
                $status     = "success";
                $message    = "Pegawai berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Pegawai gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
    public function updatePegawai(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $pegawai   = Pegawai::find($id);
            $pegawai->id_jabatan = 2; // kasir
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nomor_pegawai = $request->nomor_pegawai;
            if(!empty($request->password_akun)){
                $pegawai->password_akun = \Hash::make($request->password_akun);
            }
    
            if($pegawai->save()){
                $status     = "success";
                $message    = "Pegawai berhasil diupdate";
            }else{
                $status     = "error";
                $message    = "Pegawai gagal diupdate";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }

    public function deletePegawai(Request $request,$id) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if (!$validation_error){
            
            $pegawai   = Pegawai::find($id);
    
            if($pegawai->delete()){
                $status     = "success";
                $message    = "Pegawai berhasil dihapus";
            }else{
                $status     = "error";
                $message    = "Pegawai gagal dihapus";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }


}
