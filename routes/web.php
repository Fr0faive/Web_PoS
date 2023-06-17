<?php
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CpController;

use App\Http\Controllers\Backend\AuthController as AuthBackend;
use App\Http\Controllers\Backend\PegawaiController as PegawaiBackend;
use App\Http\Controllers\Backend\ProductCategoryController as ProductCategoryBackend;


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

Route::get("/",[AuthController::class, 'login'])->name("login")->middleware("checkLogin:false");
Route::get("/cp/dashboard",[CpController::class, 'dashboard'])->name("cp.dashboard")->middleware("checkLogin:true");

Route::post("/login_process",[AuthBackend::class, 'login'])->name("login_process");
Route::get("/logout",[AuthBackend::class, 'logout'])->name("logout");


Route::middleware(["checkLogin:true","checkRole:admin"])->group(function(){
    // Pegawai
    Route::get("/cp/pegawai",[CpController::class, 'pegawai'])->name("cp.pegawai");
    Route::get("/pegawai/datatable",[PegawaiBackend::class, 'datatable'])->name("pegawai.datatable");
    Route::get("/pegawai/{id}/get",[PegawaiBackend::class, 'getPegawai'])->name("pegawai.get");
    Route::post("/pegawai/tambah",[PegawaiBackend::class, 'insertPegawai'])->name("pegawai.insert");
    Route::post("/pegawai/{id}/edit",[PegawaiBackend::class, 'updatePegawai'])->name("pegawai.update");
    Route::post("/pegawai/{id}/delete",[PegawaiBackend::class, 'deletePegawai'])->name("pegawai.delete");

    Route::get("/cp/produk_kategori",[CpController::class, 'productCategory'])->name("cp.product_category");
    Route::get("/produk_kategori/datatable",[ProductCategoryBackend::class, 'datatable'])->name("product_category.datatable");
    Route::get("/produk_kategori/{id}/get",[ProductCategoryBackend::class, 'getProductCategory'])->name("product_category.get");
    Route::post("/produk_kategori/tambah",[ProductCategoryBackend::class, 'insertProductCategory'])->name("product_category.insert");
    Route::post("/produk_kategori/{id}/edit",[ProductCategoryBackend::class, 'updateProductCategory'])->name("product_category.update");
    Route::post("/produk_kategori/{id}/delete",[ProductCategoryBackend::class, 'deleteProductCategory'])->name("product_category.delete");
});
