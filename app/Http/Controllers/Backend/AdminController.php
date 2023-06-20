<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Riwayat_Gaji;
use App\Models\Pegawai;
use DataTables;

class AdminController extends Controller
{
    public function riwayatGajiPegawai(Request $request) {
        $id_pegawai     = !empty($request->id_pegawai) ? $request->id_pegawai : "";
        $data   = Riwayat_Gaji::select([
            "gaji_pokok",
            "bulan",
            "tahun",
            \DB::raw("(SELECT SUM(jumlah_bonus) FROM bonus_pegawai WHERE bonus_pegawai.bulan = riwayat_gaji.bulan AND bonus_pegawai.tahun = riwayat_gaji.tahun ) as bonus"),
        ])
        ->where("id_pegawai",$id_pegawai)
        ->get();
        return DataTables::of($data)->make(true);
    }
    public function hitungGajiPegawai(Request $request,$id_pegawai) {
        $status     = "";
        $message     = "";
        $validation_error   = false;

        if(!$validation_error){
            $riwayat_gaji_this_month   = Riwayat_Gaji::where("bulan",date("m"))
            ->where("tahun",date("Y"))
            ->first();

            if(!empty($riwayat_gaji_this_month)){
                $status     = "error";
                $message    = "Bulan ini telah dihitung";
                $validation_error   = true;
            }
        }

        if (!$validation_error){

            $pegawai    = Pegawai::find($id_pegawai);

            
            $riwayat_gaji   = new Riwayat_Gaji;
            $riwayat_gaji->id_pegawai = $id_pegawai;
            $riwayat_gaji->gaji_pokok = !empty($pegawai->gaji_pokok) ? $pegawai->gaji_pokok : 0;
            $riwayat_gaji->bulan = date("m");
            $riwayat_gaji->tahun = date("Y");
    
            if($riwayat_gaji->save()){
                $status     = "success";
                $message    = "Hitung Gaji berhasil diinput";
            }else{
                $status     = "error";
                $message    = "Hitung Gaji gagal diinput";
            }
        }

        $response = [
            "status" => $status,
            "message" => $message,
        ];
        return response()->json($response);
    }
}
