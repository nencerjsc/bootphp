<?php
$admin_prefix = config('app.backendRoute');
Auth::routes();
Route::get('/home', 'HomeController@index');


///Module System Core
Route::group(['module'=>'System', 'namespace' => '\App\Modules\System\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['auth','role:BACKEND']], function () {
        Route::get('/', 'BackendController@dashboard');
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
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

