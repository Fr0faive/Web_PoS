<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Absensi;
use DataTables;

class AbsensiController extends Controller
{
    public function datatable(Request $request) {
        if(Auth::guard("admin")->check()){
            $data   = Absensi::join("pegawai","pegawai.id_pegawai","=","absensi.id_pegawai")
            ->select("pegawai.nama_pegawai","pegawai.nomor_pegawai","tanggal_masuk","tanggal_keluar");

            if(!empty($request->id_pegawai)){
                $data->where("absensi.id_pegawai",$request->id_pegawai);
            }

            $data->get();
        }else{
            $id_pegawai = \AppHelper::userLogin()->id_pegawai;
            $data   = Absensi::join("pegawai","pegawai.id_pegawai","=","absensi.id_pegawai")
            ->select("pegawai.nama_pegawai","pegawai.nomor_pegawai","tanggal_masuk","tanggal_keluar")
            ->where("absensi.id_pegawai",$id_pegawai)
            ->get();
        }
        return DataTables::of($data)->make(true);
    }
    public function insertAbsensi(Request $request) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        $absensi_today  = \AppHelper::absensiToday();

        $action     = !empty($request->action) ? $request->action : "masuk";
        if(!$validation_error){
            if($action == "masuk" && !empty($absensi_today)){
                $status     = "error";
                $message    = "Anda telah melakukan absensi masuk hari ini.";
                $validation_error   = true;
            }elseif($action == "keluar" && empty($absensi_today)){
                $status     = "error";
                $message    = "Anda belum melakukan absensi masuk hari ini.";
                $validation_error   = true;
            }elseif($action == "keluar" && !empty($absensi_today->tanggal_keluar)){
                $status     = "error";
                $message    = "Anda telah melakukan absensi keluar hari ini.";
                $validation_error   = true;
            }
        }

        if (!$validation_error){
            $id_pegawai = \AppHelper::userLogin()->id_pegawai;
            if($action == "masuk"){
                $absensi   = new Absensi;
                $absensi->id_pegawai = $id_pegawai;
                $absensi->tanggal_masuk = date("Y-m-d H:i:s");
            }elseif($action == "keluar"){
                $absensi   = Absensi::find($absensi_today->id_absensi);
                $absensi->tanggal_keluar = date("Y-m-d H:i:s");
            }
    
            if($absensi->save()){
                $status     = "success";
                $message    = "Absensi berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Absensi gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }

}
