<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $table = "pegawai";
    protected $primaryKey = 'id_pegawai';

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,"id_jabatan","id_jabatan");
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class,"id_pegawai","id_pegawai");
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
