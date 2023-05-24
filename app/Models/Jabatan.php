<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $primaryKey = 'id_jabatan';

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class,"id_jabatan","id_jabatan");
    }
}
