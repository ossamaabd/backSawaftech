<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $guarded = [];
    public $timestamps = false;
    
    public function Products()
    {
        return $this->belongsTo(Product::class , 'ProductId');
    }
    public function Orders()
    {
        return $this->belongsTo(Order::class,'OrderId')->select(['id','CustomerId','OrderDate']);
    }
}
