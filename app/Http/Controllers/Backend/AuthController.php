<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Pegawai;

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
            $get_pegawai    = Pegawai::with(["jabatan"])->where("nomor_pegawai",$request->nomor_pegawai)->first();
            $role           = !empty($get_pegawai->jabatan->nama_jabatan) ? $get_pegawai->jabatan->nama_jabatan : "";
            $role           = strtolower($role);
            if(empty($role)){
                $status     = "error";
                $message    = "Nomor Pegawai / Password Salah!";
                $validation_error   = true;    
            }
        }
        
        if(!$validation_error){
            if (Auth($role)->attempt(["nomor_pegawai" => $request->nomor_pegawai, "password" => $request->password_akun],$request->has("remember_me"))) {
                $request->session()->regenerate();            
                $status     = "success";
                $message    = "Login Berhasil!";
            }else{
                $status     = "error";
                $message    = "Nomor Pegawai / Password Salah!";
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
