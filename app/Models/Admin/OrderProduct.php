<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Gender;
use App\Models\Client\Order;

class OrderProduct extends Model
{
    protected $table  =  'order_product';
    protected $guarded  = [];

    public function order()
    {
        return  $this->belongsTo(Order::class, 'order_id')->select('id', 'name');
    }

    public function delivery_status()
    {
        return  $this->belongsTo(DeliveryStatus::class)->select('name', 'id');
    }

    public function product()
    {
        return  $this->belongsTo(Product::class)->select('id', 'name');
    }
}
