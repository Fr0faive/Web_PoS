<?php
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CpController;
use App\Http\Controllers\Frontend\PegawaiController;

use App\Http\Controllers\Backend\AuthController as AuthBackend;


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
// Route::get("/cp/test",function(){
//     return "";
// })->middleware(["checkLogin:true","checkRole:pegawai"]);

Route::post("/login_process",[AuthBackend::class, 'login'])->name("login_process");
Route::get("/logout",[AuthBackend::class, 'logout'])->name("logout");


// Pegawai
Route::get("/cp/pegawai",[PegawaiController::class, 'pegawai'])->name("cp.pegawai")->middleware("checkLogin:true");
