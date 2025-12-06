<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Gender;
use App\User;
use App\Models\Client\OrderProduct;

class Order extends Model
{
    protected $table  =  'orders';
    protected $fillable  = [];

    public function order_product()
    {
        return  $this->hasMany(OrderProduct::class)->where('status', 1);
    }

    public function user()
    {
        return  $this->belongsTo(User::class, 'users_id');
    }

    public function user_detail()
    {
        return  $this->belongsTo(Users_detail::class, 'users_detail_id');
    }

    public function state()
    {
        return  $this->belongsTo(State::class, 'state_id');
    }
}
