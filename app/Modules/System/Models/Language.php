<?php

namespace App\Modules\System\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'languages';
    protected $fillable = [
        'name',
        'code',
        'flag',
        'default',
        'status',
        'hreflang',
        'charset',
        'sort'

    ];


}
