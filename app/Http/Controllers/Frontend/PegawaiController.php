<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;


class PegawaiController extends Controller
{
    public function pegawai(Request $request)
    {
        $data   = [];
        return view("pegawai.index",$data);
    }
}