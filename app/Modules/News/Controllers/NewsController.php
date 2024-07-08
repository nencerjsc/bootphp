<?php

namespace App\Modules\News\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\System\Models\Language;
use \App\Modules\News\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use View;
use Image;
use DB;
use App\Modules\News\Models\News;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        $news = News::orderBy('id', 'DESC')->paginate(10);
        $title = 'News';
        if ($request->input('keyword') != '') {
            $keyword = $request->input('keyword');
            $typeSearch = $request->input('type');
            $title = "Search: ";
            if ($typeSearch !== '') {
                switch ($typeSearch) {
                    case 'author':
                        $title .= 'Author = ';
                        break;
                    case 'language':
                        $title .= 'Language = ';
                        break;
                    case 'status':
                        $title .= 'Status = ';
                        break;
                    default:
                        $title .= 'Title = ';
                        break;
                }
                if ($typeSearch == 'status')
                    $news = News::where($typeSearch, $keyword)->orderBy('id', 'DESC')->paginate(10);
                else
                    $news = News::where($typeSearch, 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(10);
            } else {
                $news = News::where('title', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('author', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('language', 'LIKE', '%' . $keyword . '%')
                    ->orderBy('id', 'DESC')->paginate(10);
            }
            $title .= $keyword;
        }

        return view("News::index", compact('title', 'news'));
    }


    public function create()
    {
        $cats = NewsCategory::get();
        $author = auth()->user()->name;
        $author_email = auth()->user()->email;
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default', 'desc')->get()->toArray();

        return view('News::create', compact('author', 'author_email', 'languages', 'cats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'news_slug' => 'required|unique:news|max:255',
            'description' => 'required',
            'author' => 'required',
            'language' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($request->image) {
            $imagelink = explode('storage', $request->image);
            $input['image'] = '/storage' . $imagelink[1];
        }

        $input['created_at'] = now();
        $input['updated_at'] = now();

        DB::beginTransaction();
        try {
            News::create($input);
            DB::commit();
            return redirect()->route('news.index')->with('success', 'Đăng tin thành công');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('news.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $cats = NewsCategory::get();
        $news = News::find($id);
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default', 'desc')->get()->toArray();
        return view('News::edit', compact( 'news', 'languages', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'news_slug' => 'required|max:255',
        ]);

        $news = News::find($id);

        if ($request->image) {
            $imagelink = explode('storage', $request->image);
            $news->image = '/storage' . $imagelink[1];
        }
        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->description = $request->input('description');
        $news->language = $request->language;
        $news->meta = $request->meta;
        $news->view_count = $request->view_count;
        $news->status = $request->status;
        $news->publish_date = $request->publish_date;
        $news->cats = $request->cats;

        $news->save();

        return redirect()->route('news.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {

        $news = News::find($id);
        if (!$news) {
            return back()->withErrors(['error' => 'Tin này không tồn tại!']);
        }

            DB::beginTransaction();
            try {
                $news->delete();
                DB::commit();

                return redirect()->route('news.index')
                    ->with('success', 'Xóa tin thành công');

            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('news.index')
                    ->withErrors(['error' => 'Xóa tin thất bại']);
            }

    }

    public function actions(Request $request)
    {
        $val = $request->check;
        $action = $request->action;
        if (empty($val)) {
            return redirect()->route('news.index')->withErrors(['message' => 'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $news = News::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('news.index')->with('success', 'News  ' . $action . ' successfully');
    }

    private function _runAction($id, $action)
    {
        switch ($action) {
            case 'delete':
                $this->destroy($id);
                break;

            default:
                break;
        }
        return null;
    }

    public function listLanguage()
    {
        $langpath = resource_path('lang');
        $langlist = glob($langpath . '/*', GLOB_ONLYDIR);
        $lang = array();
        foreach ($langlist as $value) {
            $temp = str_replace($langpath . '/', '', $value);
            $lang[$temp] = $temp;
        }
        return $lang;
    }

    public function ajaxSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return $slug;
    }


}
