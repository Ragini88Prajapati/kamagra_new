<?php

namespace App\Models\Admin;

use App\Models\Admin\Users_detail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    function users_detail()
    {
        return $this->hasMany(Users_detail::class, 'users_id')->where('status', 1);
    }
}
