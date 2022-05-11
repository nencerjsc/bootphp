<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'user_groups';
    protected $fillable = [
        'name',
        'description',
        'status',
        'hideit',
    ];


}
