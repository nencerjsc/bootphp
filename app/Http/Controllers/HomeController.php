<?php

namespace App\Http\Controllers;

use App\Services\Cart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Cart::add('293ad1233423', 'Product 1', 1, 9.99, 550);
        dd(Cart::content());
        //\Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //\Cart::store('username');
//dd(\Cart::content());
        return view('home');
    }
}
