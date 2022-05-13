<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'credits', 'gender', 'avatar', 'group', 'parent_id', 'credits_enc', 'currency_code', 'language', 'twofactor', 'twofactor_secret', 'ref', 'birthday', 'email_verified_at', 'phone',
    ];

}