<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\Produk_Kategori;
use App\Models\Supplier;
use App\Models\Jenis_Bonus;
use App\Models\Produk;


class CpController extends Controller
{
    public function dashboard(Request $request)
    {
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $month = $now->format('F');
        $day = $now->format('d');
        $dayOfWeek = $now->format('l');
        $timeRange = $now->format('H:i');
            
        $data   = [];
        $data["total_product"]  = Produk::count();
        $data["total_supplier"]  = Supplier::count();
        $data["total_pegawai"]  = Pegawai::count();
        $data["month"]  = $month;
        $data["day"]  = $day;
        $data["dayOfWeek"]  = $dayOfWeek;
        $data["timeRange"]  = $timeRange;
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

    public function absensi(Request $request)
    {
        $data   = [];
        return view("cp.absensi",$data);
    }

    public function purchase_order(Request $request)
    {
        $data   = [];
        $data["suppliers"]           = Supplier::all();
        return view("cp.po",$data);
    }

    public function gaji_pegawai(Request $request)
    {
        $bulan_arr = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];
        $data   = [];
        $data["jenis_bonus"]           = Jenis_Bonus::all();
        $data["bulan_arr"]              = $bulan_arr;
        return view("cp.gaji_pegawai",$data);
    }

    public function penjualan(Request $request)
    {
        $data   = [];
        return view("cp.penjualan",$data);
    }

    public function invoice(Request $request)
    {
        $data   = [];
        return view("cp.invoice",$data);
    }

    public function detail_invoice(Request $request,$nomor_invoice)
    {
        $data   = [];
        return view("cp.detail_invoice",$data);
    }
    
}