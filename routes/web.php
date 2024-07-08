<?php
$admin_prefix = config('app.backendRoute') ?? 'admincp';
Auth::routes();

///Module System Core
Route::group(['module'=>'System', 'namespace' => '\App\Modules\System\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','admin']], function () {
        Route::get('/', 'BackendController@dashboard');
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::post('/ajax', 'BackendController@updateToggle');
        Route::resource('sliders','SlidersController');
        Route::resource('currencies','CurrencyController');
        Route::post('currencies/actions','CurrencyController@actions');
        Route::resource('seo','SeoController');
        Route::resource('menu','MenuController');

        //Language
        Route::get('/language',['as'=>'backend.language.setting', 'uses'=> 'LanguageController@index'] );
        Route::get('/language/install/{code}',['as'=>'backend.language.install', 'uses'=> 'LanguageController@install'] );
        Route::get('/language/uninstall/{code}',['as'=>'backend.language.uninstall', 'uses'=> 'LanguageController@uninstall'] );
        Route::get('/language/{id}/update',['as'=>'backend.language.update', 'uses'=> 'LanguageController@updatelang'] );
        Route::patch('/language/{id}/update',['as'=>'backend.language.postupdate', 'uses'=> 'LanguageController@postupdatelang'] );

        //Setting
        Route::resource('settings','SettingController');
        Route::get('setting/create-key','SettingController@createSetting')->name('setting.create.key');;
        Route::post('setting/create-key','SettingController@postSetting')->name('setting.create.key');
        Route::get('clear-cache','SettingController@clearCache')->name('setting.clear.cache');

        //Page
        Route::resource('pages', 'PageController');

    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/', 'FrontendController@index');
    });

});

///Module User
Route::group(['module'=>'User', 'namespace' => '\App\Modules\User\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','admin']], function () {
        Route::resource('users','UserController');
        Route::resource('groups','GroupControler');
        Route::post('users/action','UserController@actions')->name('users.action.post');
    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {

    });
});


//news
Route::group(['module'=>'News', 'namespace' => '\App\Modules\News\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','admin']], function () {
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



///Module Ztest
Route::group(['module'=>'Ztest', 'namespace' => '\App\Modules\Ztest\Controllers'], function () use ($admin_prefix) {
    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/test', 'ZtestFrontController@test');
    });
});
