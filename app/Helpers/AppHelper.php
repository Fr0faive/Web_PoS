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
}