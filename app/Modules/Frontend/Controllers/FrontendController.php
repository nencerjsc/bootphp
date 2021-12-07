<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Lang;
use Validator;
use App;
use DB;
use View;
use Cart;
use Cache;
use Cookie;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FrontendController extends Controller
{

    public $route;

    public function __construct()
    {
        ////Xử lý dữ liệu quan trọng
        $list_lang = $this->listLanguage();
        View::share('languages', $list_lang);

        $currencies = App\Modules\Currency\Models\Currencies::where(['status' => 1])->orderBy('sort', 'ASC')->get();
        View::share('currencies', $currencies);
    }


    public function index()
    {
        $title = "Hello word";
        return view('pages.home', compact( 'title'));
    }

    public function postSetSiteCurrency(Request $request)
    {
        $code = strip_tags($request->code);
        if ($code) {
            $currency = App\Modules\Currency\Models\Currencies::where(['code' => $code, 'status' => 1, 'wallet' => 1])->first();
            if ($currency) {
                session()->put('currency', $currency);
                return back()->with('success', 'Currency: ' . $currency->code);
            }
        }
        return back()->withErrors(['error' => 'Loại tiền tệ không đúng.']);
    }

    public function postSetSiteLang(Request $request)
    {
        $code = strip_tags($request->code);
        if ($code) {
            $lang = App\Modules\Language\Models\Language::where(['code' => $code, 'status' => 1])->first();
            if ($lang) {
                Cookie::queue('lang_code', $code, 2880);
                return redirect(route('home'), 301)->with('success', 'Lang: ' . $lang->name);
            }
        }
        return back()->withErrors(['error' => 'Ngôn ngữ không tồn tại']);
    }

    public function userlogin(Request $request)
    {
        if (Auth::check() && auth()->user()->hasRole('SUPER_ADMIN|BACKEND')) {
            echo 'Bạn hãy copy link này vào trình duyệt ẩn để đăng nhập (Ctrl + Shift + N)<br>';
            $url = url('/userlogin') . '/' . $request->id . '/' . $request->token;
            echo $url;

        } else {
            $key = env('APP_KEY');
            $user = User::find($request->id);
            $ip = getIpClient();
            if (!$user || $user->hasRole('SUPER_ADMIN|BACKEND')) {
                return redirect()->route('home');
            }
            $mytoken = sha1($user->id . $user->email . $user->phone . $user->password . $user->mkc2 . $key . $ip);
            if ($request->token == $mytoken) {
                Auth::loginUsingId($request->id);
                if (Auth::user()->id != intval($request->id)) {
                    Auth::logout();
                }
                return redirect()->route('home')->with('Đăng nhập thành công');
            }
        }

    }

    public function listLanguage()
    {

        $lang = App\Modules\Language\Models\Language::where('status', 1)->pluck('name', 'code');
        return $lang;
    }

    public static function breadcumbs(array $data = null)
    {
        if ($data && is_array($data)) {
            $home = [['title' => __('home.homepage'), 'url' => url('/')]];
            $breadcrumbs = array_merge($home, $data);
            $breadcrumbs_rend = theme_view('widgets.breadcrumb', compact('breadcrumbs'))->render();
            return $breadcrumbs_rend;
        } else {
            return null;
        }
    }

}
