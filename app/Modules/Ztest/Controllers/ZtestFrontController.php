<?php

namespace App\Modules\Ztest\Controllers;
use App\Modules\Frontend\Controllers\FrontendController;
use App\Modules\Ztest\Models\Ztest;

class ZtestFrontController extends FrontendController
{
    public function test(){
        echo 'test';
    }
}
