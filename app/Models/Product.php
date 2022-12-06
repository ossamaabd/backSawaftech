<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];
    public $timestamps = false;

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupplierId');
    }

    public function Orders()
    {
        return $this->belongsToMany(Order::class,'order_items','ProductId','OrderId','id','id')->withPivot('UnitPrice','Quantity');
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
