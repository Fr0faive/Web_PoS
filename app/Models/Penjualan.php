<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";
    protected $primaryKey = 'id_penjualan';
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,"id_pegawai","id_pegawai");
    }
    public function detail_penjualan()
    {
        return $this->hasMany(Detail_Penjualan::class,"id_penjualan","id_penjualan");
    }
}
