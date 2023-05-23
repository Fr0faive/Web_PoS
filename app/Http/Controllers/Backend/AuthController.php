<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $status             = "";
        $message            = "";
        $validation_error   = false;

        $validator = Validator::make($request->all(), [
            'nomor_pegawai' => ['required'],
            'password_akun' => ['required'],
        ]);
  
        if ($validator->fails()) {
            $status     = "error";
            $message    = $validator->errors()->first();
            $validation_error   = true;
        }
        
        if(!$validation_error){
            if (Auth::attempt(["nomor_pegawai" => $request->nomor_pegawai, "password" => $request->password_akun],$request->has("remember_me"))) {
                $request->session()->regenerate();            
                $status     = "success";
                $message    = "Login Berhasil!";
            }else{
                $status     = "error";
                $message    = "Login Gagal!";
            }
        }
        $response   = [
            "status"    => $status,
            "message"    => $message,
        ];

        return response()->json($response);
 
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
