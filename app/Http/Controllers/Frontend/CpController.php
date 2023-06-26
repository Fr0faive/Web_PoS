<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\Produk_Kategori;
use App\Models\Supplier;
use App\Models\Jenis_Bonus;
use App\Models\Produk;
use App\Models\Penjualan;


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
        $penjualan          = Penjualan::with(["detail_penjualan","detail_penjualan.produk"])->where("nomor_invoice",$nomor_invoice)->first();
        // dd($penjualan->toArray());
        $data   = [];
        $data["penjualan"]  = $penjualan;
        return view("cp.detail_invoice",$data);
    }
    public function laporanPenjualan(Request $request)
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

        $omzet_arr  = [];
        $penjualan_arr  = [];
        for ($i=0; $i < 12; $i++) { 
            $penjualan_arr[$i] = [
                "name"  => $bulan_arr[$i],
                "y"     => 0
            ];
            $omzet_arr[$i] = 0;
        }
        $year       = date("Y");

        $get_penjualan  = \DB::table("penjualan")
        ->where(\DB::raw("YEAR(tanggal_penjualan)"),$year)
        ->get();
        foreach($get_penjualan as $penjualan){
            $month  = date("m",strtotime($penjualan->tanggal_penjualan));
            $index  = intval($month) - 1;

            $omzet_arr[$index]  += $penjualan->total_harga;
            $penjualan_arr[$index]["y"]++;
        }

        $data   = [];
        $data["year"]  = $year;
        $data["omzet_arr"]  = $omzet_arr;
        $data["penjualan_arr"]  = $penjualan_arr;
        return view("cp.laporan_penjualan",$data);
    }
    
}