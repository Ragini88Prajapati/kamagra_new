<?php

namespace App\Models\Client;

use App\Models\Admin\Brand;
use App\Models\Admin\Product_images;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Gender;

class Product extends Model
{
    protected $table  =  'product';
    protected $fillable  = [];

    public function brand()
    {
        return  $this->belongsTo(Brand::class)->select('id', 'name')->where('status', 1);
    }

    public function product_type()
    {
        return  $this->belongsTo(ProductType::class)->select('id', 'name')->where('status', 1);
    }

    public function product_image()
    {
        return  $this->hasMany(Product_images::class)->where('status', 1);
    }

    public function gender()
    {
        return  $this->belongsTo(Gender::class)->select('id', 'name')->where('status', 1);
    }
}
