<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po_Produk extends Model
{
    use HasFactory;
    protected $table = "po_produk";
    protected $primaryKey = 'id_po_produk';
}
