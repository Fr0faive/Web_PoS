<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\Produk_Kategori;
use App\Models\Supplier;


class CpController extends Controller
{
    public function dashboard(Request $request)
    {
        $data   = [];
        return view("cp.dashboard",$data);
    }
    public function pegawai(Request $request)
    {
        $data   = [];
        return view("cp.pegawai",$data);
    }
    public function productCategory(Request $request)
    {
        $data   = [];
        return view("cp.product_category",$data);
    }
    
    public function supplier(Request $request)
    {
        $data   = [];
        return view("cp.supplier",$data);
    }

    public function product(Request $request)
    {
        $data   = [];
        $data["product_categories"]   = Produk_Kategori::all();
        $data["suppliers"]           = Supplier::all();
        return view("cp.product",$data);
    }
}