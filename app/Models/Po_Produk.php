<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po_Produk extends Model
{
    use HasFactory;
    protected $table = "po_produk";
    protected $primaryKey = 'id_po_produk';

    public function purchase_order()
    {
        return $this->belongsTo(Purchase_Order::class,"id_po","id_po");
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class,"id_produk","id_produk");
    }
}
