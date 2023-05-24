<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    use HasFactory;
    protected $table = "purchase_order";
    protected $primaryKey = 'id_po';

    public function supplier()
    {
        return $this->hasMany(Supplier::class,"id_supplier","id_supplier");
    }
    public function po_produk()
    {
        return $this->hasMany(Po_Produk::class,"id_po","id_po");
    }
}
