<?php
$admin_prefix = config('app.backendRoute');
Route::group(['module'=>'User', 'namespace' => '\App\Modules\User\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['web','auth','admin']], function () {
        Route::resource('users','UserController');
        Route::resource('groups','GroupControler');
        Route::post('users/action','UserController@actions')->name('users.action.post');
    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {

    });
});
