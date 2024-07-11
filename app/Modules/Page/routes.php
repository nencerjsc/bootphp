<?php
$admin_prefix = config('app.backendRoute');
Route::group(['module'=>'System', 'namespace' => '\App\Modules\Page\Controllers'], function () use ($admin_prefix) {
    //Backend
    Route::group(['prefix'=>$admin_prefix, 'middleware' =>['web','auth','admin']], function () {
        Route::resource('pages', 'PageController');

    });

    //Frontend
    Route::group(['middleware' =>['web']], function () {
    });

});
