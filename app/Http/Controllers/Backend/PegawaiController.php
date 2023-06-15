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

    public function datatable(Request $request) {
        $data   = Pegawai::with("jabatan")->select("id_pegawai","id_jabatan","nama_pegawai","nomor_pegawai")->get();
        return DataTables::of($data)->make(true);
    }


}
