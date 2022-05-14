<?php
$admin_prefix = config('app.backendRoute') ?? 'admincp';
Auth::routes();

///Module System Core
Route::group(['module'=>'System', 'namespace' => '\App\Modules\System\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::get('/', 'BackendController@dashboard');
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::post('/ajax', 'BackendController@updateToggle');
        Route::resource('sliders','SlidersController');
        Route::resource('currencies','CurrencyController');
        Route::post('currencies/actions','CurrencyController@actions');
        Route::resource('seo','SeoController');
        Route::resource('menu','MenuController');
    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/', 'FrontendController@index');
    });

});

///Module User
Route::group(['module'=>'User', 'namespace' => '\App\Modules\User\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::resource('users','UserController');
        Route::resource('groups','GroupControler');
        Route::post('users/action','UserController@actions')->name('users.action.post');
    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {

    });
});

///Module Ztest
Route::group(['module'=>'Ztest', 'namespace' => '\App\Modules\Ztest\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::get('/test', 'ZtestFrontController@test');
    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/test', 'ZtestFrontController@test');
    });
});
// Module Language
Route::group(['module'=>'Language', 'namespace' => '\App\Modules\Language\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::get('/language',['as'=>'backend.language.setting', 'uses'=> 'LanguageController@index'] );
        Route::get('/language/install/{code}',['as'=>'backend.language.install', 'uses'=> 'LanguageController@install'] );
        Route::get('/language/uninstall/{code}',['as'=>'backend.language.uninstall', 'uses'=> 'LanguageController@uninstall'] );
        Route::get('/language/{id}/update',['as'=>'backend.language.update', 'uses'=> 'LanguageController@updatelang'] );
        Route::patch('/language/{id}/update',['as'=>'backend.language.postupdate', 'uses'=> 'LanguageController@postupdatelang'] );

        Route::get('/language/files/{lang_code}',['as'=>'backend.language.files', 'uses'=> 'LanguageController@langFile']);
        Route::get('/language/translate/{lang}',['as'=>'backend.language.trans.filename', 'uses'=> 'LanguageController@translate']);
        Route::get('/language/reset/{code}',['as'=>'backend.language.reset.filename', 'uses'=> 'LanguageController@resetlang']);
        Route::get('/language/sync',['as'=>'backend.language.syncLang', 'uses'=> 'LanguageController@syncLang']);
        Route::get('/language/cache/{code}',['as'=>'backend.language.cache.filename', 'uses'=> 'LanguageController@cachelang']);
        Route::post('/language/ajax/translate',['as'=>'backend.language.ajax.translate', 'uses'=> 'LanguageController@updatetranslate']);
        Route::get('/language/key/{lang}/{filename}',['as'=>'backend.language.trans.createkey', 'uses'=> 'LanguageController@createKey']);
        Route::post('/language/key',['as'=>'backend.language.trans.createkey', 'uses'=> 'LanguageController@postKey']);
        Route::get('/language/{key}/del',['as'=>'backend.language.trans.delkey', 'uses'=> 'LanguageController@deleteKey']);
    });
});

// FrontEnd
Route::group(['module'=>'Frontend', 'namespace' => '\App\Modules\System\Controllers'], function () use ($admin_prefix) {
    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/', 'FrontendController@index');
    });
});
//slider
Route::group(['module'=>'Page', 'namespace' => '\App\Modules\Page\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::resource('pages', 'PageController');
    });
});
//news
Route::group(['module'=>'News', 'namespace' => '\App\Modules\News\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
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

Route::group(['module'=>'Setting', 'namespace' => '\App\Modules\Setting\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::resource('settings','SettingController');
        Route::get('setting/create-key','SettingController@createSetting')->name('setting.create.key');;
        Route::post('setting/create-key','SettingController@postSetting')->name('setting.create.key');
        Route::get('clear-cache','SettingController@clearCache')->name('setting.clear.cache');
    });
});
