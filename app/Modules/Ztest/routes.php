<?php
$admin_prefix = config('app.backendRoute');
Route::group(['module'=>'Ztest', 'namespace' => '\App\Modules\Ztest\Controllers'], function () use ($admin_prefix) {
    //Frontend
    Route::group(['middleware' =>['web']], function () {
        Route::get('/test', 'ZtestFrontController@test');
    });
});
