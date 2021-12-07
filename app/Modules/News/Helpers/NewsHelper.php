<?php


namespace App\Modules\News\Helpers;

use DB;

class NewsHelper {
    public static function getCateChilds($cates = []) {
        $childrens = DB::table('news_cats')->whereIn('parent_id', $cates)->get();
        while (count($childrens) > 0) {
            $child_cates = [];
            foreach ($childrens as $child) {
                $child_cates[] = $child->id;
                $cates[] =  $child->id;
            }
            $childrens = DB::table('news_cats')->whereIn('parent_id', $child_cates)->get();
        }
        return $cates;
    }
}
