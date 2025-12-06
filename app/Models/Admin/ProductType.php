<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table  =  'product_type';
    protected $guarded  = [];

    function product()
    {
        return $this->hasMany(Product::class)->where('status', 1);
    }
}
