<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table  =  'product_type';
    protected $fillable  = [];

    function product()
    {
        return $this->hasMany(Product::class)->where('status', 1);
    }
}
