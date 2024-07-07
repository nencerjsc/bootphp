<?php

namespace App\Modules\System\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\System\Helpers\BackendHelper;
use App\Modules\Language\Models\Language;
use App\Modules\Language\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use DB;
use File;
use Cache;
use Lang;
use Artisan;

class LanguageController extends Controller
{
    public $mod_menu;
    public function __construct()
    {
        $this->mod_menu = view('Language::mod_menu')->render();
    }
    public function index()
    {
        $title = "Cấu hình ngôn ngữ";
        /// Đã được cài đặt
        $listinstalled = Language::all();

        //// Chưa được cài đặt
        $path = resource_path('lang');
        $listLang = array_map('basename', File::directories($path));

        $list_not_installed = [];
        foreach ($listLang as $value) {
            $checkinstalled = Language::where('code', $value)->first();
            if (!$checkinstalled) {
                $list_not_installed[] = [
                    'name' => 'Ngôn ngữ ' . $value,
                    'code' => $value,
                ];
            }

        }
        $mod_menu = $this->mod_menu;
        return view('Language::index', compact('title', 'list_not_installed', 'listinstalled', 'mod_menu'));

    }

    public function install($code)
    {
        $path = resource_path('lang');
        $listLang = array_map('basename', File::directories($path));
        if (in_array($code, $listLang)) {
            $lang = Language::where('code', $code)->first();
            if (!$lang) {
                $input = [
                    'name' => 'Ngôn ngữ ' . $code,
                    'code' => $code,
                    'flag' => $code . '.png',
                    'default' => 0,
                    'hreflang' => null,
                    'charset' => null,
                    'status' => 0,
                    'sort' => 0,
                    'installed' => 1
                ];
                $result = DB::table('languages')->insert($input);
                if ($result) {

                    return redirect()->route('backend.language.setting')->with('success', 'Cài đặt ngôn ngữ thành công. Bạn cần sửa lại thông tin kết nối!');

                } else {
                    return 'Error insert data';
                }
            } else {
                return $code . ' đã được cài đặt';
            }
        } else {
            return 'Cài đặt thất bại. Ngôn ngữ không tồn tại trong hệ thống';
        }
    }

    public function uninstall($code)
    {
        $lang = Language::where('code', $code)->first();

        if ($lang) {
            $lang->delete();
            return redirect()->back()->with('success', 'Xóa thành công ngôn ngữ ' . $code);
        } else {
            return redirect()->back()->withErrors(['error' => 'Xóa thất bại']);
        }
    }

    public function updatelang($id)
    {
        $title = "Cấu hình ngôn ngữ";
        $lang = Language::find($id);
        if ($lang) {
            return view('Language::update', compact('title', 'lang'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Không tồn tại ngôn ngữ này']);
        }
    }


    public function postupdatelang(Request $request)
    {
        $id = $request->id;
        $lang = Language::find($id);
        if ($lang) {
            $input = $request->all();

            if ($request->default) {
                $input['default'] = 1;
            } else {
                $input['default'] = 0;
            }

            if ($request->status) {
                $input['status'] = 1;
            } else {
                $input['status'] = 0;
            }
            $input['update'] = now();

            $lang->update($input);
            return redirect()->route('backend.language.setting')->with('success', 'Cập nhật ngôn ngữ thành công');
        } else {
            return redirect()->back()->withErrors(['error' => 'Không cập nhật được ngôn ngữ này']);
        }
    }

    public function translate(Request $request){
        $lang_code = $request->lang;
        ///Nạp file
        $this->importlang($lang_code);

        $lang_codes = Language::pluck('name', 'code')->toArray();
        $cols = [
            'action_cols' => [
                'lang_key' => ['input', null],
                'lang_code' => ['select', $lang_codes, $lang_code],
                'content' => ['input', null],
            ],
            'export_cols' => ['lang_code', 'lang_key', 'filename', 'key', 'content', 'type', 'created_at'],
            'sum_cols' => [],
        ];

        $model = Translation::orderBy('id', 'desc');
        $backenHelper = new BackendHelper($model);
        $filter = $backenHelper->showFilter($cols, route('backend.language.trans.filename', $lang_code));
        if(count($request->all())){
            $request_data = $request->all();
        }else{
            $request_data = ['lang_code' => $lang_code];
        }
        $trans = $backenHelper->FilterData($request_data, $cols, 50);
        $lang = Language::where('code', $lang_code)->first();
        if(!$lang){
            return redirect()->back()->withErrors(['error' => 'Không tồn tại ngôn ngữ này']);
        }
        $title = 'Biên dịch '. $lang->name;
        $mod_menu = $this->mod_menu;
        return view('Language::translate', compact('title', 'trans', 'lang_code', 'mod_menu', 'filter'));
    }

    public function importlang($code){

        $file_infos = File::allFiles(resource_path('lang/') . $code);
        foreach ($file_infos as $key => $file_info) {
            $file = pathinfo($file_info)['filename'];

            $translations = Lang::get($file, [],$code, false);

            if(is_array($translations) && count($translations) > 0){
                foreach ($translations as $key => $translation){

                    $check = Translation::where('key', $code.'_'.$file.'_'.$key)->first();

                    if(is_array($translation)){
                        $content = json_encode($translation);
                        $type = 'array';
                    }else{
                        $content = $translation;
                        $type = 'string';
                    }
                    if($check){
                        continue;
                    }else{
                        if($type == 'string'){
                            $trans = new Translation;
                            $trans->lang_code = $code;
                            $trans->lang_key = $file.'.'.$key;
                            $trans->key = $code.'_'.$file.'_'.$key;
                            $trans->filename = $file;
                            $trans->content = $content;
                            $trans->type = $type;
                            $trans->save();
                            unset($tran);
                        }
                    }
                }

            }

        }

        Cache::forget('langcache_'.$code);
    }

    ////Reset file gốc
    public function resetlang($code){

        $file_infos = File::allFiles(resource_path('lang/') . $code);
        foreach ($file_infos as $key => $file_info) {
            $file = pathinfo($file_info)['filename'];

            $translations = Lang::get($file, [],$code, false);

            if(is_array($translations) && count($translations) > 0){
                foreach ($translations as $key => $translation){

                    $check = Translation::where('key', $code.'_'.$file.'_'.$key)->first();

                    if(is_array($translation)){
                        $content = json_encode($translation);
                        $type = 'array';
                    }else{
                        $content = $translation;
                        $type = 'string';
                    }
                    if($check){
                        $check->content = $content;
                        $check->update();
                    }else{
                        $trans = new Translation;
                        $trans->lang_code = $code;
                        $trans->lang_key = $file.'.'.$key;
                        $trans->key = $code.'_'.$file.'_'.$key;
                        $trans->filename = $file;
                        $trans->content = $content;
                        $trans->type = $type;
                        $trans->save();
                        unset($tran);
                    }
                }

            }

        }

        return redirect()->back()->with('success', 'Ghi đè ngôn ngữ từ tệp tin vào CSDL thành công');

    }

    public function cachelang($code){

        $lang = \App\Modules\Language\Models\Translation::where('lang_code', $code)->pluck('content','lang_key');
        File::put(resource_path('/lang/'.$code.'.json'), json_encode($lang));
        Artisan::call('view:clear');
        return redirect()->back()->with('success', 'Xuất bản ngôn ngữ thành công');
    }


    public function updatetranslate(Request $request){

        if(isset($request->id)){
            $tran = Translation::find($request->id);
            if($tran){
                $tran->content = $request->contentt;
                $tran->update();
            }
        }
    }

    ///Tạo key dịch
    public function createKey($lang, $filename){
        $title = 'Thêm khóa ngôn ngữ';
        $lang = Language::where('code', $lang)->first();
        return view('Language::createkey', compact('title', 'lang', 'filename'));
    }

    public function postKey(Request $request){

        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $other_langs = Language::pluck('code')->toArray();
        $k = 0;
        if(count($other_langs)){
            foreach ($other_langs as $code){

                /// Kiểm tra lang key tồn tại chưa
                $check = Translation::where('key', $code.'_'.$request->file.'_'.$request->key)->first();
                if(!$check){
                    $trans = new Translation();
                    $trans->lang_code = $code;
                    $trans->lang_key = $request->file.'.'.$request->key;
                    $trans->filename = $request->file;
                    $trans->key = $code.'_'.$request->file.'_'.$request->key;
                    $trans->content = $request->value;
                    $trans->type = 'string';
                    $trans->save();

                    $k++;
                }
            }
        }

        if($k>0){
            return redirect()->route('backend.language.trans.filename', $request->lang)->with('success', 'Thêm khóa ngôn ngữ thành công');
        }else{
            return redirect()->back()->withErrors(['error' => 'Thêm không thành công hoặc khóa ngôn ngữ đã tồn tại']);
        }

    }

    public function deleteKey($key){

        /// Kiểm tra lang key tồn tại chưa
        $trans = Translation::find($key);
        if($trans){
            $trans->delete();
            return redirect()->route('backend.language.trans.filename', $trans->lang_code)->with('success', 'Thêm khóa ngôn ngữ thành công');
        }else{
            return redirect()->route('backend.language.setting')->withErrors(['error' => 'Khóa ngôn ngữ đã tồn tại']);
        }
    }


    public function syncLang(){
        ini_set('max_execution_time', 300);
        $default_lang = Language::where('default', 1)->first();
        if($default_lang){
            $other_langs = Language::where('code', '!=', $default_lang->code)->get();
            if(count($other_langs)){
                $default_trans = Translation::where('lang_code', $default_lang->code)->get();
                if(count($default_trans)){

                    foreach ($other_langs as $other_lang){

                        foreach ($default_trans as $tran){

                            if(!Translation::where('lang_code', $other_lang->code)->where('key', $other_lang->code.'_'.str_replace(".","_",$tran->lang_key))->first()){
                                $new_word = new Translation();
                                $new_word->lang_code = $other_lang->code;
                                $new_word->lang_key = $tran->lang_key;
                                $new_word->filename = $tran->filename;
                                $new_word->key = $other_lang->code.'_'.str_replace(".","_",$tran->lang_key);
                                $new_word->content = $tran->content;
                                $new_word->type = $tran->type;
                                $new_word->save();
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('backend.language.setting')->with('success','Đồng bộ thành công!');
    }


}
