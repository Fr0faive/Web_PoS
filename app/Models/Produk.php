<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $primaryKey = 'id_produk';

    public function produk_kategori()
    {
        return $this->belongsTo(Produk_Kategori::class,"id_produk_kategori","id_produk_kategori");
    }
    public function produk_supplier()
    {
        return $this->hasOne(Produk_Supplier::class,"id_produk","id_produk");
    }
    public function po_produk()
    {
        return $this->hasMany(Po_Produk::class,"id_produk","id_produk");
    }
    public function detail_penjualan()
    {
        return $this->hasMany(Detail_Penjualan::class,"id_produk","id_produk");
    }
}
