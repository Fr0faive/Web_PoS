<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = "pegawai";
    protected $primaryKey = 'id_pegawai';

    public function getAuthPassword()
    {
        return $this->password_akun;
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,"id_jabatan","id_jabatan");
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class,"id_pegawai","id_pegawai");
    }
    }
    public function bonus_pegawai()
    {
        return $this->hasMany(Bonus_Pegawai::class,"id_pegawai","id_pegawai");
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class,"id_pegawai","id_pegawai");
    }
}
