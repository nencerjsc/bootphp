<?php

namespace App\Modules\System\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Language\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use File;
use Cache;
use App\Modules\Setting\Models\Setting;
use Artisan;
class SettingController extends Controller
{

    public $mod_menu;

    public function __construct()
    {
    }
    public function index(){
        $title = "Setting general";
        $timezone = $this->arrayTimezone();
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default')->get()->toArray();
        $setting = Setting::pluck('value', 'key')->toArray();
        $additionals = Setting::where('type','custom')->pluck('value', 'key')->toArray();;
        return view('Setting::index', compact('title', 'setting', 'timezone', 'languages', 'groups', 'mod_menu', 'additionals'));
    }

    public function store(Request $request){
        $input = $request->all();
        if ($request->favicon) {
            $favicon = explode('storage', $request->favicon);
            if(isset($favicon[1])){
                $input['favicon'] = '/storage' . $favicon[1];
            }
        }
        if ($request->logo) {
            $logo = explode('storage', $request->logo);
            if(isset($logo[1])){
                $input['logo'] = '/storage' . $logo[1];
            }
        }
        if ($request->backendlogo) {
            $backendlogo = explode('storage', $request->backendlogo);
            if(isset($backendlogo[1])){
                $input['backendlogo'] = '/storage' . $backendlogo[1];
            }
        }
        try{
            if(isset($input['_token'])){
                unset($input['_token']);
            }
            foreach ($input as $key => $value) {
                $set = Setting::where('key', $key)->first();
                if ($set) {
                    $set->value = $value;
                    $set->update();
                }else{
                    $set = new Setting();
                    $set->key = $key;
                    $set->value = $value ?? null;
                    $set->tab = "custom";
                    $set->save();
                }
            }
        }catch (\Exception $ex){
            return redirect()->back()->withErrors($ex->getMessage());
        }
        Cache::forget('settings');
        return redirect()->route('settings.index')->with("success","Cập nhâp thành công");
    }

    public function arrayTimezone()
    {
        $timezone = view('Setting::timezone')->render();
        return json_decode($timezone);
    }

    public function createSetting()
    {
        $title = 'Create key setting';
        return view('Setting::create', compact('title'));
    }

    public function postSetting(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|unique:settings',
            'value' => 'required',
        ]);

        $setting = new Setting();
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->type = 'custom';
        $setting->save();
        Cache::forget('settings');
        return redirect()->route('settings.index')->with('success', 'Create key success');
    }
    public function clearCache(){
        Artisan::call('cache:clear');
        return redirect()->back()->with("success","Clear cache success");
    }

}
