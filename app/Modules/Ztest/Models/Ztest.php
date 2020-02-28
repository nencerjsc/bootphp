<?php

namespace App\Modules\Ztest\Models;

use Illuminate\Database\Eloquent\Model;

class Ztest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        'name',
        'username',
        'email',
    ];


}