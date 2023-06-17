<?php
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CpController;

use App\Http\Controllers\Backend\AuthController as AuthBackend;
use App\Http\Controllers\Backend\PegawaiController as PegawaiBackend;


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


// Pegawai
Route::middleware(["checkLogin:true","checkRole:admin"])->group(function(){
    Route::get("/cp/pegawai",[CpController::class, 'pegawai'])->name("cp.pegawai");
    Route::get("/pegawai/datatable",[PegawaiBackend::class, 'datatable'])->name("pegawai.datatable");
    Route::get("/pegawai/{id}/get",[PegawaiBackend::class, 'getPegawai'])->name("pegawai.get");
    Route::post("/pegawai/tambah",[PegawaiBackend::class, 'insertPegawai'])->name("pegawai.insert");
    Route::post("/pegawai/{id}/edit",[PegawaiBackend::class, 'updatePegawai'])->name("pegawai.update");
    Route::post("/pegawai/{id}/delete",[PegawaiBackend::class, 'deletePegawai'])->name("pegawai.delete");
});
