<?php
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CpController;

use App\Http\Controllers\Backend\AuthController as AuthBackend;
use App\Http\Controllers\Backend\AdminController as AdminBackend;
use App\Http\Controllers\Backend\PegawaiController as PegawaiBackend;
use App\Http\Controllers\Backend\ProductCategoryController as ProductCategoryBackend;
use App\Http\Controllers\Backend\ProductController as ProductBackend;
use App\Http\Controllers\Backend\SupplierController as SupplierBackend;
use App\Http\Controllers\Backend\AbsensiController as AbsensiBackend;
use App\Http\Controllers\Backend\POController as POBackend;
use App\Http\Controllers\Backend\BonusPegawaiController as BonusPegawaiBackend;
use App\Http\Controllers\Backend\PenjualanController as PenjualanBackend;
use App\Http\Controllers\Backend\InvoiceController as InvoiceBackend;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get("/logout",[AuthBackend::class, 'logout'])->name("logout");

Route::middleware(["checkLogin:false"])->group(function(){
    Route::get("/",[AuthController::class, 'login'])->name("login");
    Route::post("/login_process",[AuthBackend::class, 'login'])->name("login_process");
});

Route::middleware(["checkLogin:true"])->group(function(){
    Route::get("/cp/dashboard",[CpController::class, 'dashboard'])->name("cp.dashboard");

    // Absensi
    Route::get("/cp/absensi",[CpController::class, 'absensi'])->name("cp.absensi");
    Route::get("/absensi/datatable",[AbsensiBackend::class, 'datatable'])->name("absensi.datatable");

    // Penjualan
    Route::get("/cp/invoice",[CpController::class, 'invoice'])->name("cp.invoice");
    Route::get("/invoice/{nomor_invoice}",[CpController::class, 'detail_invoice'])->name("penjualan.invoice");
    Route::get("/cp/penjualan",[CpController::class, 'penjualan'])->name("cp.penjualan");
    Route::get("/penjualan/{id}/get",[PenjualanBackend::class, 'getPenjualan'])->name("penjualan.get");
    Route::get("/penjualan/datatable",[PenjualanBackend::class, 'datatable'])->name("penjualan.datatable");
    Route::post("/penjualan/tambah",[PenjualanBackend::class, 'insertPenjualan'])->name("penjualan.insert");

    // Purchase Order
    Route::get("/cp/purchase_order",[CpController::class, 'purchase_order'])->name("cp.purchase_order");
    Route::get("/purchase_order/datatable",[POBackend::class, 'datatable'])->name("purchase_order.datatable");
    Route::get("/purchase_order/{id}/get",[POBackend::class, 'getPO'])->name("purchase_order.get");
    Route::post("/purchase_order/tambah",[POBackend::class, 'insertPO'])->name("purchase_order.insert");
    Route::post("/purchase_order/{id}/edit",[POBackend::class, 'updatePO'])->name("purchase_order.update");
    Route::post("/purchase_order/{id}/update_waktu_pengiriman",[POBackend::class, 'updateDeliveryTime'])->name("purchase_order.updateDeliveryTime");
    Route::post("/purchase_order/{id}/update_waktu_penerimaan",[POBackend::class, 'updateReceivedTime'])->name("purchase_order.updateReceivedTime");
    Route::get("/purchase_order/{id_po_produk}/get_produk",[POBackend::class, 'getProduct'])->name("purchase_order.getProduct");
    Route::get("/purchase_order/get_many_produk",[POBackend::class, 'getManyProduct'])->name("purchase_order.getManyProduct");
    Route::get("/purchase_order/datatable_produk",[POBackend::class, 'datatableProduct'])->name("purchase_order.datatableProduct");
    Route::post("/purchase_order/{id_po}/tambah_produk",[POBackend::class, 'insertProduct'])->name("purchase_order.insertProduct");
    Route::post("/purchase_order/{id_po_produk}/edit_produk",[POBackend::class, 'updateProduct'])->name("purchase_order.updateProduct");

    // Product
    Route::get("/cp/produk",[CpController::class, 'product'])->name("cp.product");
    Route::get("/produk/datatable",[ProductBackend::class, 'datatable'])->name("product.datatable");
    Route::post("/produk/{id}/update_stok",[ProductBackend::class, 'updateStokProduct'])->name("product.update_stok");
    Route::get("/produk/getBy",[ProductBackend::class, 'getProductBy'])->name("product.getBy");

    // Print generate
    Route::get("/generate-invoice",[InvoiceBackend::class, 'generateInvoice'])->name("generateInvoice");
});

Route::middleware(["checkLogin:true","checkRole:kasir"])->group(function(){
    // Absensi
    Route::post("/absensi/tambah",[AbsensiBackend::class, 'insertAbsensi'])->name("absensi.insert");
});
Route::middleware(["checkLogin:true","checkRole:admin"])->group(function(){
    // Pegawai
    Route::get("/cp/pegawai",[CpController::class, 'pegawai'])->name("cp.pegawai");
    Route::get("/pegawai/datatable",[PegawaiBackend::class, 'datatable'])->name("pegawai.datatable");
    Route::get("/pegawai/{id}/get",[PegawaiBackend::class, 'getPegawai'])->name("pegawai.get");
    Route::post("/pegawai/tambah",[PegawaiBackend::class, 'insertPegawai'])->name("pegawai.insert");
    Route::post("/pegawai/{id}/edit",[PegawaiBackend::class, 'updatePegawai'])->name("pegawai.update");
    Route::post("/pegawai/{id}/hapus",[PegawaiBackend::class, 'deletePegawai'])->name("pegawai.delete");

    // Product Category
    Route::get("/cp/produk_kategori",[CpController::class, 'productCategory'])->name("cp.product_category");
    Route::get("/produk_kategori/datatable",[ProductCategoryBackend::class, 'datatable'])->name("product_category.datatable");
    Route::get("/produk_kategori/{id}/get",[ProductCategoryBackend::class, 'getProductCategory'])->name("product_category.get");
    Route::post("/produk_kategori/tambah",[ProductCategoryBackend::class, 'insertProductCategory'])->name("product_category.insert");
    Route::post("/produk_kategori/{id}/edit",[ProductCategoryBackend::class, 'updateProductCategory'])->name("product_category.update");
    Route::post("/produk_kategori/{id}/hapus",[ProductCategoryBackend::class, 'deleteProductCategory'])->name("product_category.delete");

    // Supplier
    Route::get("/cp/supplier",[CpController::class, 'supplier'])->name("cp.supplier");
    Route::get("/supplier/datatable",[SupplierBackend::class, 'datatable'])->name("supplier.datatable");
    Route::get("/supplier/{id}/get",[SupplierBackend::class, 'getSupplier'])->name("supplier.get");
    Route::post("/supplier/tambah",[SupplierBackend::class, 'insertSupplier'])->name("supplier.insert");
    Route::post("/supplier/{id}/edit",[SupplierBackend::class, 'updateSupplier'])->name("supplier.update");
    Route::post("/supplier/{id}/hapus",[SupplierBackend::class, 'deleteSupplier'])->name("supplier.delete");

    // Product
    Route::get("/produk/{id}/get",[ProductBackend::class, 'getProduct'])->name("product.get");
    Route::post("/produk/tambah",[ProductBackend::class, 'insertProduct'])->name("product.insert");
    Route::post("/produk/{id}/edit",[ProductBackend::class, 'updateProduct'])->name("product.update");
    Route::post("/produk/{id}/hapus",[ProductBackend::class, 'deleteProduct'])->name("product.delete");

    // Purchase Order
    Route::post("/purchase_order/{id}/hapus",[POBackend::class, 'deletePO'])->name("purchase_order.delete");
    Route::post("/purchase_order/{id_po_produk}/hapus_produk",[POBackend::class, 'deleteProduct'])->name("purchase_order.deleteProduct");

    // Bonus Pegawai
    Route::get("/bonus_pegawai/{id}/get",[BonusPegawaiBackend::class, 'getBonusPegawai'])->name("bonus_pegawai.get");
    Route::get("/bonus_pegawai/datatable",[BonusPegawaiBackend::class, 'datatable'])->name("bonus_pegawai.datatable");
    Route::post("/bonus_pegawai/{id_pegawai}/tambah",[BonusPegawaiBackend::class, 'insertBonusPegawai'])->name("bonus_pegawai.insert");
    Route::post("/bonus_pegawai/{id}/edit",[BonusPegawaiBackend::class, 'updateBonusPegawai'])->name("bonus_pegawai.update");
    Route::post("/bonus_pegawai/{id}/hapus",[BonusPegawaiBackend::class, 'deleteBonusPegawai'])->name("bonus_pegawai.delete");

    // Admin
    Route::get("/cp/gaji_pegawai",[CpController::class, 'gaji_pegawai'])->name("cp.gaji_pegawai");
    Route::post("/admin/{id}/hitung_gaji_pegawai",[AdminBackend::class, 'hitungGajiPegawai'])->name("admin.hitung_gaji_pegawai");
    Route::get("/admin/riwayat_gaji_pegawai",[AdminBackend::class, 'riwayatGajiPegawai'])->name("admin.riwayat_gaji_pegawai");
    Route::get("/cp/laporan_penjualan",[CpController::class, 'laporanPenjualan'])->name("cp.laporan_penjualan");
    Route::post("/admin/get_laporan_penjualan",[AdminBackend::class, 'getLaporanPenjualan'])->name("admin.get_laporan_penjualan");

});
