<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Bonus extends Model
{
    use HasFactory;
    protected $table = "jenis_bonus";
    protected $primaryKey = 'id_jenis_bonus';
}
