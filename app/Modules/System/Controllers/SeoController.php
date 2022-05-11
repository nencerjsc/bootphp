<?php

namespace App\Modules\System\Controllers;


use App\Modules\Language\Models\Language;
use App\Modules\System\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use DB;
use Schema;

class SeoController extends Controller
{


    public function index(Request $request)
    {
        $title = "Seo Onpage";
        $seos = Seo::orderBy('id', 'DESC')->paginate(25);
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $title = "Search: " . $keyword;
            $seos = Seo::where('link', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(25);
        }
        return view("System::seo.index", compact('title', 'seos'));
    }

    public function create()
    {
        $title = "Create Seo link";
        $langs = Language::where('status', 1)->orderBy('default', 'DESC')->get();
        return view('System::seo.create', compact('title', 'langs'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'link' => 'required|unique:seo',
        ]);
        $input = $request->all();
        $link = $request->link;

        $url = url('/');
        $uri = str_replace($url, '', $link);

        if ($uri == $link) {
            return back()->withErrors(['error' => 'Chỉ hỗ trợ các link nội bộ, tên miền không hợp lệ']);
        }

        if ($uri == "" || $uri == null) {
            $input['link'] = '/';
        } else {
            $input['link'] = $uri;
        }

        $check = Seo::where('link', $input['link'])->first();
        if ($check) {
            return back()->withErrors(['error' => 'Đường dẫn đã tồn tại']);
        }

        if ($request->image) {
            $input['image'] = str_replace($url, '', $request->image);
        }
        Seo::create($input);
        return redirect()->route('seo.index')
            ->with('success', 'Seo meta được tạo thành công');
    }

    public function edit($id)
    {
        if (auth()->user()->hasRole('SUPER_ADMIN|ADMIN')) {

            $title = "Sửa Seo meta";
            $langs = Language::where('status', 1)->orderBy('default', 'DESC')->get();
            $seo = Seo::find($id);
            return view('Seo::edit', compact('title', 'seo', 'langs'));
        } else {
            echo 'Not Access';
            return 'no access';
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'meta' => 'required',
        ]);

        $seo = Seo::find($id);
        if ($request->image) {
            $url = url('/');
            $image = $request->image;
            $seo->image = str_replace($url, '', $image);
        }
        $seo->lang = $request->lang;
        $seo->meta = $request->meta;
        $seo->save();
        return redirect()->route('seo.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {

        Seo::find($id)->delete();
        return redirect()->route('seo.index')
            ->with('success', 'Xóa thành công');

    }


}
