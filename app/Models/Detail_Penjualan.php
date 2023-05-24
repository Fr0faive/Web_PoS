<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Penjualan extends Model
{
    use HasFactory;
    protected $table = "detail_penjualan";
    protected $primaryKey = 'id_detail_penjualan';

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class,"id_penjualan","id_penjualan");
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class,"id_produk","id_produk");
    }
}
