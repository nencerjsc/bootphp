<?php

namespace App\Modules\System\Models;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{

    protected $table = 'seo';
    protected $fillable = [
        'link', 'meta', 'image', 'lang'
    ];
    protected $casts = [
        'meta' => 'array'
    ];

    public static function getMeta()
    {
        $uri = request()->getRequestUri();
        $seo = Seo::where('link', $uri)->first();
        if ($seo) {
            return $seo;
        } else {
            return null;
        }
    }

    public static function renderSeo(array $data, $blade = null)
    {
        if ($blade) {
            return theme_view('widgets.seo.' . $blade, compact('data'))->render();
        } else {
            return theme_view('widgets.seo.noindex', compact('data'))->render();
        }
    }


}
