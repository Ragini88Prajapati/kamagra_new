<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Order;

class OrderProduct extends Model
{
    protected $table  =  'order_product';
    protected $fillable  = [];

    public function order()
    {
        return  $this->belongsTo(Order::class, 'order_id')->select('id', 'name')->where('status', 1);
    }

    public function delivery_status()
    {
        return  $this->belongsTo(DeliveryStatus::class)->select('name', 'id');
    }

    public function product()
    {
        return  $this->belongsTo(Product::class)->select('id', 'name', 'image', 'image_path', 'brand_id', 'subtitle');
    }
}
