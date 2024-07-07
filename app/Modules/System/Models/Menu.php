<?php

namespace App\Modules\System\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'menu';
    protected $fillable = [
    	// 'id',
		'name',
        'menu_type',
        'url',
		'parent_id',
		'level',
		'children_count',
		'status',
        'language',
        'sort_order'
		// 'created_at',
		// 'updated_at',
    ];


}
