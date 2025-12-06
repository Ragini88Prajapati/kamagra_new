<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\OrderProduct;
use App\Models\Admin\User;

class Order extends Model
{
    protected $table  =  'orders';
    protected $guarded  = [];

    public function order_product()
    {
        return  $this->hasMany(OrderProduct::class, 'order_id')->where('status', 1);
    }

    public function user()
    {
        return  $this->belongsTo(User::class, 'users_id');
    }

    public function state()
    {
        return  $this->belongsTo(State::class, 'state_id');
    }
}
