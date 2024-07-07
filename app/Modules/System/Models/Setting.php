<?php

namespace App\Modules\System\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'key','value', 'tab', 'contents'
    ];

    protected $casts = [
        'contents' => 'array'
    ];


    /**s
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
