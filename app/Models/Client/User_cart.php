<?php

namespace App\Models\Client;

use App\Models\Client\Product;
use Illuminate\Database\Eloquent\Model;
use App\ProductVariant;

class User_cart extends Model
{
    protected $table = 'user_cart';
    protected $gaurded = [];

    function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->select('id', 'slug', 'name', 'subtitle','price')->where('status', 1);
    }
    function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_id')->select('*');
    }
}
