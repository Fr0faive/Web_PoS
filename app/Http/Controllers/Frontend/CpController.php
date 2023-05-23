<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CpController extends Controller
{
    public function dashboard(Request $request)
    {
        $data   = [];
        return view("cp.dashboard",$data);
    }
}