<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Supplier extends Model
{
    use HasFactory;
    protected $table = "produk_supplier";
    protected $primaryKey = 'id_produk_supplier';

    public function produk()
    {
        return $this->belongsTo(Produk::class,"id_produk","id_produk");
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,"id_supplier","id_supplier");
    }
}
