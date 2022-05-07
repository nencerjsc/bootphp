<?php

namespace App\Modules\System\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Lang;
use DB;
use Cache;
use Cookie;
use App\User;

class FrontendController extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        return theme_view('pages.home');
    }

}
