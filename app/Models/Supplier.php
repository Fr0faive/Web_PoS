<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "supplier";
    protected $primaryKey = 'id_supplier';
    public function produk_supplier()
    {
        return $this->hasMany(Produk_Supplier::class,"id_supplier","id_supplier");
    }
    public function purchase_order()
    {
        return $this->hasMany(Purchase_Order::class,"id_supplier","id_supplier");
    }
}
