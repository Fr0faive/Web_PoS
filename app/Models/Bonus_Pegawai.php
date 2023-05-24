<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus_Pegawai extends Model
{
    use HasFactory;
    protected $table = "bonus_pegawai";
    protected $primaryKey = 'id_bonus_pegawai';
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,"id_pegawai","id_pegawai");
    }
    public function jenis_bonus()
    {
        return $this->belongsTo(Jenis_Bonus::class,"id_jenis_bonus","id_jenis_bonus");
    }
}
