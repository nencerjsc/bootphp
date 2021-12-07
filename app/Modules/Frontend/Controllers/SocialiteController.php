<?php
namespace App\Modules\Frontend\Controllers;

use App\Modules\Wallet\Controllers\WalletController;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Log;
use Cookie;

class SocialiteController extends FrontendController {

  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
  public function redirectToprovider($provider) {
    if (!Auth::check()) {
      $client_info = Cookie::get('client_info');
      session(['auth0'.$client_info=> md5(uniqid())]);

      return Socialite::driver($provider)->redirect();
    } else {
      return redirect()->route('home')->withErrors(['error' => 'Bạn vẫn đang đăng nhập!']);
    }

  }

  /**
   * Return a callback method from facebook api.
   *
   * @return callback URL from facebook
   */
  public function callbackFromprovider($provider) {
    $client_info = Cookie::get('client_info');
    if(!session('auth0'.$client_info)){
      return redirect()->route('home')->withErrors(['error' => 'Lỗi đăng nhập!']);
    }

    try{
      session()->forget('auth0'.$client_info);
      $user = Socialite::driver($provider)->user();
      if(!$user || !$user->token){
        return redirect()->route('home')->withErrors(['error' => 'Lỗi đăng nhập!']);
      }

      ///Log::info(['google' => $user]);
      $authUser = $this->findOrCreateUser($user, $provider);
      if ($authUser) {

        if ($authUser->hasRole('BACKEND')) {

          return redirect()->route('home')->withErrors(['error' => 'Đăng nhập thất bại!']);

        } else {
          Auth::login($authUser, true);
          return redirect()->route('home');
        }

      } else {
        return redirect()->route('home')->withErrors(['error' => 'Lỗi đăng nhập!']);
      }
    }catch (\Exception $e){

      return redirect()->route('home')->withErrors(['error' => 'Lỗi đăng nhập!']);
    }

  }

  public function findOrCreateUser($user, $provider) {
    $authUser = User::where('provider_id', $user->id)->where('email', $user->email)->first();
    if ($authUser) {
      if ($authUser->hasRole('BACKEND')) {
        return false;
      }
      return $authUser;
    } else {
      $group_setting = \App\Modules\Setting\Models\Setting::where('key', 'default_user_group')->first();
      $group_id = 2;
      if ($group_setting) {
        $group_id = $group_setting->value;
      }
      $email_user = User::where('email', $user->email)->first();
      if (!$email_user) {
        $userdata = [
                'name' => $user->name,
                'email' => $user->email,
                'username' => 'fb' . $user->id,
                'phone' => null,
                'password' => Hash::make(md5($user->email . time())),
                'group' => $group_id,
                'provider' => $provider,
                'provider_id' => $user->id,
                'status' => 1
        ];
        DB::beginTransaction();
        try {
          $new_user = User::create($userdata);
          /// Tạo role USER
          DB::table('model_has_roles')->insert(
                  ['role_id' => 5, 'model_type' => 'App\User', 'model_id' => $new_user->id]
          );
          /// Tạo ví
          WalletController::makeWalletFromUserId($new_user->id);
          DB::commit();
          return $new_user;
        } catch (\Exception $e) {
          DB::rollback();
          return false;
        }

      } else {
        return false;
      }


    }

  }

//// Facebook callback
  //{"token":"EAAEsqd7nD4MBAIpgv9mWHEcXiglqYVDEZBySDl7xyX6drUZAv3YqzNRbj5tG8mKfDDZCEFSjqTnv2ZBhLNtjwv3cMmE6FxdFjIZApDLVbUfrWN0bo5kZBcsI8fCijpdfE78pQhD8sEzfzCbdry6hSMR6tHUy7N3ZAUEUiVOgtyA2G1cYCCGtZCKX",
//"refreshToken":null,
//"expiresIn":5183999,
//"id":"2752571748102156",
//"nickname":null,
//"name":"Neo Nguyen",
//"email":"hotronet@gmail.com",
//"avatar":"https:\/\/graph.facebook.com\/v3.0\/2752571748102156\/picture?type=normal",
//"user":{"
//name":"Neo Nguyen",
//"email":"hotronet@gmail.com",
//"id":"2752571748102156"},
//"avatar_original":"https:\/\/graph.facebook.com\/v3.0\/2752571748102156\/picture?width=1920",
//"profileUrl":null}

//// Google callback
//'token' => 'ya29.a0Adw1xeWoL6SWJN03qaNiKvrzlp3oBusyeA9cTpspBY8uNDqo0Dn836WCAbIoABRhZwI-mFn9yNTIKfoXlPGN5jIObExo7jPRaPlPthDyAqsoSHJWIEOdFOOp4Q4ZdoVNfFDvuVf1F0Y1VuKe0ZKQGvD9n8Sqw_b2-tg',
//'refreshToken' => NULL,
//'expiresIn' => 3599,
//'id' => '106923964674686087365',
//'nickname' => NULL,
//'name' => 'NEO NGUYEN',
//'email' => 'support@nencer.com',
//'avatar' => 'https://lh6.googleusercontent.com/-lyAgrYGQqzk/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nBlmWY_gx3dJUBSBvwnZbdNLxRHmg/photo.jpg',
//'user' =>
//array (
//'id' => '106923964674686087365',
//'email' => 'support@nencer.com',
//'verified_email' => true,
//'name' => 'NEO NGUYEN',
//'given_name' => 'NEO',
//'family_name' => 'NGUYEN',
//'link' => 'https://plus.google.com/106923964674686087365',
//'picture' => 'https://lh6.googleusercontent.com/-lyAgrYGQqzk/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nBlmWY_gx3dJUBSBvwnZbdNLxRHmg/photo.jpg',
//'gender' => 'male',
//'locale' => 'vi',
//'hd' => 'nencer.com',
//),
//'avatar_original' => 'https://lh6.googleusercontent.com/-lyAgrYGQqzk/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nBlmWY_gx3dJUBSBvwnZbdNLxRHmg/photo.jpg',



}


