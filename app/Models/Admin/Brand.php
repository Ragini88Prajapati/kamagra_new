<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table  =  'brand';
    protected $guarded  = [];

    function product()
    {
        return $this->hasMany(Product::class)->where('status', 1);
    }
}
