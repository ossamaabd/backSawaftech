<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];
    public $timestamps = false;

    public function Customer()
    {
        return $this->belongsTo(Customer::class , 'CustomerId');
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class,'order_items','ProductId','OrderId','id','id')->withPivot('UnitPrice','Quantity')->as('order_itmes');
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class , 'OrderId');
    }

}
