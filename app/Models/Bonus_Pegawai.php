<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus_Pegawai extends Model
{
    use HasFactory;
    protected $table = "bonus_pegawai";
    protected $primaryKey = 'id_bonus_pegawai';
}
