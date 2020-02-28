<?php

$namespace = 'App\Modules\Frontend\Controllers';
$middleware = ["web"];
Route::group(['middleware' =>['web'] , 'module'=>'Frontend', 'namespace' => $namespace], function () {


});

Route::group(['middleware' => $middleware, 'module'=>'Frontend', 'namespace' => $namespace], function () {

});

