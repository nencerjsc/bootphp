<?php
$admin_prefix = config('app.backendRoute');
Route::group(['module'=>'News', 'namespace' => '\App\Modules\News\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['web','auth','admin']], function () {
        Route::resource('news','NewsController');
        Route::resource('news_cat','NewsCatController');
        Route::post('news/actions','NewsController@actions');
        Route::post('news_cat/actions','NewsCatController@actions');
        Route::post('make/ajaxslug', 'NewsController@ajaxSlug');
        Route::post('news_categories/ajaxPost','NewsCatController@ajaxPost')->name('news_categories.ajaxpost');
        Route::post('news_categories/ajaxItemAction','NewsCatController@ajaxItemAction')->name('news_categories.ajaxitemaction');
        Route::post('news_categories/renderCreateForm','NewsCatController@renderCreateForm')->name('news_categories.ajaxrenderform');
    });
    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('news', ['as'=>'frontend.news.index', 'uses'=>'NewsFrontController@index']);
        Route::get('news/{news_slug}.html', ['as'=>'frontend.news.view', 'uses'=>'NewsFrontController@newsDetail']);
        Route::get('news/{category_slug}', ['as'=>'frontend.news_category.view', 'uses'=>'NewsFrontController@renderNewsCategory']);
    });
});
