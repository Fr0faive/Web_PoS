<?php
namespace App\Helpers;
class AppHelper{
    public static function instance() {
        return new AppHelper(); 
    }
    static function activeGuard(){
        foreach(array_keys(config('auth.guards')) as $guard){
            if(auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
    static function userLogin(){    
        return auth()->guard(\AppHelper::activeGuard())->user();
    }
    static function absensiToday(){
        $id_pegawai     = \AppHelper::userLogin()->id_pegawai;
        return \DB::table("absensi")->where("id_pegawai",$id_pegawai)
        ->where(\DB::raw("DATE(tanggal_masuk)"),date("Y-m-d"))
        ->first();
    }
}