<?php

namespace App\Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
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
