<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Kategori extends Model
{
    use HasFactory;
    protected $table = "produk_kategori";
    protected $primaryKey = 'id_produk_kategori';

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
