<?php
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CpController;

use App\Http\Controllers\Backend\AuthController as AuthBackend;
use App\Http\Controllers\Backend\PegawaiController as PegawaiBackend;
use App\Http\Controllers\Backend\ProductCategoryController as ProductCategoryBackend;
use App\Http\Controllers\Backend\ProductController as ProductBackend;
use App\Http\Controllers\Backend\SupplierController as SupplierBackend;
use App\Http\Controllers\Backend\AbsensiController as AbsensiBackend;
use App\Models\Absensi;
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

    Route::get("/cp/absensi",[CpController::class, 'absensi'])->name("cp.absensi");
    Route::get("/absensi/datatable",[AbsensiBackend::class, 'datatable'])->name("absensi.datatable");
    Route::post("/absensi/tambah",[AbsensiBackend::class, 'insertAbsensi'])->name("absensi.insert");
});

Route::middleware(["checkLogin:true","checkRole:admin"])->group(function(){
    // Pegawai
    Route::get("/cp/pegawai",[CpController::class, 'pegawai'])->name("cp.pegawai");
    Route::get("/pegawai/datatable",[PegawaiBackend::class, 'datatable'])->name("pegawai.datatable");
    Route::get("/pegawai/{id}/get",[PegawaiBackend::class, 'getPegawai'])->name("pegawai.get");
    Route::post("/pegawai/tambah",[PegawaiBackend::class, 'insertPegawai'])->name("pegawai.insert");
    Route::post("/pegawai/{id}/edit",[PegawaiBackend::class, 'updatePegawai'])->name("pegawai.update");
    Route::post("/pegawai/{id}/delete",[PegawaiBackend::class, 'deletePegawai'])->name("pegawai.delete");

    // Product Category
    Route::get("/cp/produk_kategori",[CpController::class, 'productCategory'])->name("cp.product_category");
    Route::get("/produk_kategori/datatable",[ProductCategoryBackend::class, 'datatable'])->name("product_category.datatable");
    Route::get("/produk_kategori/{id}/get",[ProductCategoryBackend::class, 'getProductCategory'])->name("product_category.get");
    Route::post("/produk_kategori/tambah",[ProductCategoryBackend::class, 'insertProductCategory'])->name("product_category.insert");
    Route::post("/produk_kategori/{id}/edit",[ProductCategoryBackend::class, 'updateProductCategory'])->name("product_category.update");
    Route::post("/produk_kategori/{id}/delete",[ProductCategoryBackend::class, 'deleteProductCategory'])->name("product_category.delete");

    // Supplier
    Route::get("/cp/supplier",[CpController::class, 'supplier'])->name("cp.supplier");
    Route::get("/supplier/datatable",[SupplierBackend::class, 'datatable'])->name("supplier.datatable");
    Route::get("/supplier/{id}/get",[SupplierBackend::class, 'getSupplier'])->name("supplier.get");
    Route::post("/supplier/tambah",[SupplierBackend::class, 'insertSupplier'])->name("supplier.insert");
    Route::post("/supplier/{id}/edit",[SupplierBackend::class, 'updateSupplier'])->name("supplier.update");
    Route::post("/supplier/{id}/delete",[SupplierBackend::class, 'deleteSupplier'])->name("supplier.delete");

    // Product
    Route::get("/cp/produk",[CpController::class, 'product'])->name("cp.product");
    Route::get("/produk/datatable",[ProductBackend::class, 'datatable'])->name("product.datatable");
    Route::get("/produk/{id}/get",[ProductBackend::class, 'getProduct'])->name("product.get");
    Route::post("/produk/tambah",[ProductBackend::class, 'insertProduct'])->name("product.insert");
    Route::post("/produk/{id}/edit",[ProductBackend::class, 'updateProduct'])->name("product.update");
    Route::post("/produk/{id}/delete",[ProductBackend::class, 'deleteProduct'])->name("product.delete");
    Route::post("/produk/{id}/update_stok",[ProductBackend::class, 'updateStokProduct'])->name("product.update_stok");
});
