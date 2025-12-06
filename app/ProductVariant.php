<?php

namespace App;

use App\Models\Client\Product;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $table = 'product_variants';
    protected $gaurded = [];

    function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->select('id', 'slug', 'name', 'subtitle','price','image')->where('status', 1);
    }
}
