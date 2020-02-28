<?php

$namespace = 'App\Modules\Ztest\Controllers';
$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Ztest', 'namespace' => $namespace], function () {

});

Route::group(['middleware' =>['web'] , 'module'=>'Ztest', 'namespace' => $namespace], function () {
    Route::get('/nghia', 'ZtestFrontController@nghia');

});
