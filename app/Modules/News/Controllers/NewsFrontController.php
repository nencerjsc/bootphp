<?php

namespace App\Modules\News\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;
use Illuminate\Http\Request;
use Session;
use App;

use App\Modules\News\Models\News;
use Cache;
use App\Modules\Seo\Models\Seo;
use App\Modules\News\Models\NewsCategory;

class NewsFrontController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (App::getLocale())
            $locale = App::getLocale();
        else
            $locale = 'vi';
        $news = News::where('language', '=', $locale)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $sum = News::orderBy('id', 'ASC')->count();

        /// Xử lý seo
        $seoObj = Cache::remember('new', 60, function () {
            return Seo::where('link', '/news')->first();
        });
        $seo['title'] = $seoObj->meta['title'] ?? null;
        $seo['description'] = $seoObj->meta['description'] ?? null;
        $seo['keyword'] = $seoObj->meta['keyword'] ?? null;
        $seo['lang'] = app()->getLocale();
        $seo['image'] = $seoObj->image ?? null;
        $seo_advanced = Seo::renderSeo($seo, 'page');

        $bread[0]['title'] = __('news.news_title');
        $bread[0]['url'] = route('frontend.news.index');
        $breadcumbs = FrontendController::breadcumbs($bread);
        $popular_news = News::where('language', '=', $locale)
            ->where('status', 1)
            ->orderBy('view_count', 'DESC')
            ->limit(30)
            ->paginate(12);
        // số tin hiên
        $sums = $popular_news->count();
        $cates = NewsCategory::where('status',1)->where('parent_id',0)->orderBy('sort','ASC')->limit(7)->get();
        if ($cates->count()){
            foreach ($cates as $cate){
                $cate_childs = App\Modules\News\Helpers\NewsHelper::getCateChilds([$cate->id]);
                $cate->news =  News::whereIn('cats',$cate_childs)->where('status', 1)->orderBy('id','DESC')->limit(4)->get();
                $cate->child = App\Modules\News\Models\NewsCategory::where('parent_id',$cate->id)->orderBy('sort','ASC')->get();
            }
        }
        return theme_view('pages.tintuc', compact('sums','sum','news', 'seo_advanced', 'breadcumbs', 'recent_news', 'popular_news', 'support_news', 'solution_news', 'important_news', 'tags_list', 'cates'));
    }

    public static function getListNews($locale = 'vi', $limit = 10)
    {
        $news = News::where('language', '=', $locale)
            ->where('status', 1)
            ->limit($limit)
            ->orderBy('id', 'DESC')
            ->get();

        return $news;
    }

    public function newsDetail(Request $request)
    {
        $locale = App::getLocale() ?? "vi";
        $news = News::where('news_slug', '=', $request->news_slug)
            ->where('status', 1)
            ->first();
        // Get popular news by view count
        $popular_news = News::where('language', '=', $locale)
            ->where('status', 1)
            ->orderBy('view_count', 'DESC')
            ->limit(10)
            ->get();
        if ($news) {
            $related_news = News::where('cats', $news->cats)->where('id','!=',$news->id)->where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
            /// Xử lý seo
            $seo = array();
            $seo['title'] = $news->meta['title'] ?? null;
            $seo['description'] = $news->meta['description'] ?? null;
            $seo['keyword'] = $news->meta['keyword'] ?? null;
            $seo['lang'] = app()->getLocale();
            $seo['image'] = $news->image;
            $seo['created_at'] = $news->created_at;
            $seo['body'] = $news->description;
            $seo['author'] = $news->author;
            $seo_advanced = App\Modules\Seo\Models\Seo::renderSeo($seo, 'article');
            $news->view_count = $news->view_count + 1;
            $news->save();

            $cate = NewsCategory::find($news->cats);
            $bread[0]['title'] = __('news.news_title');
            $bread[0]['url'] = route('frontend.news.index');
            if($cate){
                $bread[1]['title'] = $cate->name;
                $bread[1]['url'] = route('frontend.news_category.view', $cate->url_key);
            }
            $breadcumbs = FrontendController::breadcumbs($bread);

            return theme_view('pages.chitiet', compact('news', 'seo_advanced', 'breadcumbs', 'popular_news', 'related_news','cate'));
        } else {
            return abort(404);
        }
    }

    public static function renderNewsCategory(Request $request)
    {
        $locale = App::getLocale() ?? "vi";
        $news_category = App\Modules\News\Models\NewsCategory::where('url_key', '=', strip_tags($request->category_slug))
            ->where('status', 1)
            ->first();
        if ($news_category) {
            $childs = App\Modules\News\Helpers\NewsHelper::getCateChilds([$news_category->id]);
            $news = News::whereIn('cats', $childs)->where('status', 1)->where('language', $locale)->orderBy('id', 'DESC')->limit(4)->paginate(20);
            $bread[0]['title'] = __('news.news_title');
            $bread[0]['url'] = route('frontend.news.index');
            $breadcumbs = FrontendController::breadcumbs($bread);

            return theme_view('pages.news_category', compact('news_category', 'breadcumbs', 'news'));
        } else {
            return redirect()->route('home')->withErrors(['error' => __('home.news_cat_not_existed')]);
        }
    }
}
