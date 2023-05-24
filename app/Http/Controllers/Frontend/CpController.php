<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;


class CpController extends Controller
{
    public function dashboard(Request $request)
    {
        $data   = [];
        return view("cp.dashboard",$data);
    }
}