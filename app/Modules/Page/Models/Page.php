<?php

namespace App\Modules\Page\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'html_description',
        'image',
        'author_email',
        'language',
        'status',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array'
    ];

}