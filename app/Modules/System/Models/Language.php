<?php

namespace App\Modules\System\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

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
