<?php


namespace App\Modules\News\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model {
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'news_cats';
    protected $fillable = [
        'id',
        'name',
        'url_key',
        'description',
        'parent_id',
        'sort',
        'image',
        'level',
        '_lft',
        '_rgt',
        'lang',
        'status',
    ];
    ///Lấy select của form
    public static function getListCatalog($lang_code){
        $node = NewsCategory::where('lang', $lang_code)->withDepth()->get();
        $traverse = function ($categories) use (&$traverse) {
            $data = [];
            foreach ($categories as $category) {
                $data[$category->id] = static::prefix($category->depth).$category->name;
                $traverse($category->children);
            }
            return $data;
        };
        return $traverse($node);
    }

    public static function getCateList($node){

        $traverse = function ($categories) use (&$traverse) {
            $data = [];
            foreach ($categories as $category) {
                $data[static::prefix($category->depth)." ".$category->name] = $category;
                $traverse($category->children);
            }
            return $data;
        };

        return $traverse($node);
    }

    public static function prefix($num){
        $prefix = '';
        for ($i= 0; $i<$num; $i++){
            $prefix .= '-';
        }
        return $prefix;
    }



}
