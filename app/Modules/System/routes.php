<?php
$admin_prefix = config('app.backendRoute');
Route::group(['module'=>'System', 'namespace' => '\App\Modules\System\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['web','auth','admin']], function () {
        Route::get('/', 'BackendController@dashboard')->name('admin.home');
        Route::post('/ajax', 'BackendController@updateToggle');
        Route::resource('sliders','SlidersController');
        Route::resource('currencies','CurrencyController');
        Route::post('currencies/actions','CurrencyController@actions');
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

    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/', 'FrontendController@index')->name('home');
    });

});
