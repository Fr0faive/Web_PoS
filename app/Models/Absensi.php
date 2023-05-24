<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = "absensi";
    protected $primaryKey = 'id_absensi';
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,"id_pegawai","id_pegawai");
    }
}
