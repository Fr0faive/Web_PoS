<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Gaji extends Model
{
    use HasFactory;
    protected $table = "riwayat_gaji";
    protected $primaryKey = 'id_riwayat_gaji';
}
