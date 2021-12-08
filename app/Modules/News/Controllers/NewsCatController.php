<?php


namespace App\Modules\News\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Language\Models\Language;
use Illuminate\Http\Request;
use App\Modules\News\Models\NewsCategory;
use View;
use Validator;
use Auth;

class NewsCatController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        ///ProductCat::fixTree();
        $cats = NewsCategory::orderBy('id', 'DESC')->paginate(25);
        $title = 'List Catalog';
        return view("News::news_cat.index", compact('cats', 'title'));
    }

    public function create()
    {

        $title = 'Tạo mới';
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default', 'desc')->get()->toArray();

        $default_lang = 'vi';
        $cat_lists = NewsCategory::get();
        return view('News::news_cat.create', compact('languages', 'title', 'cat_lists'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url_key' => 'required',
            'lang' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = $input['cat_id'] ?? null;
        if ($input['parent_id']) {
            $parent_cate = NewsCategory::find($input['parent_id']);
            $parent_cate->save();
        }
        if ($request->image) {
            $imagelink = explode('storage', $request->image);
            $input['image'] = '/storage' . $imagelink[1];
        }
        $input['status'] = empty($input['status']) ? 1 : $input['status'];
        $cat = NewsCategory::create($input);
        if (isset($cat->id)) {
            return redirect()->route('news_cat.index')
                ->with('success', __('admin.create_success'));
        } else {
            return redirect()->route('news_cat.index')
                ->withErrors(['error' => __('admin.create_failed')]);
        }

    }

    public function edit($id)
    {
        $cat = NewsCategory::where('id', $id)->first();
        $title = 'Edit ' . $cat->name;
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default', 'desc')->get()->toArray();

        $cat_lists = NewsCategory::where('id', '!=', $id)->get();
        return view("News::news_cat.edit", compact('id', 'languages', 'cat', 'title', 'cat_lists'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'url_key' => 'required',
            'lang' => 'required',
        ]);
        $cate = NewsCategory::find($id);
        if ($request->cat_id == $cate->id) {
            return redirect()->route('news_cat.index')
                ->withErrors(['error' => __('admin.parent_error')]);
        }
        $cate_status = empty($request->status) ? 1 : $request->status;
        $parent_id = $request->cat_id ?? null;
        $cate->name = $request->name;
        $cate->url_key = $request->url_key;
        $cate->parent_id = $parent_id;
        $cate->description = $request->description;
        /*$cate->custom_layout = $request->custom_layout;*/
        $cate->sort = $request->sort;
        $cate->status = $cate_status;
        if ($request->image) {
            $imagelink = explode('storage', $request->image);
            $cate->image = '/storage' . $imagelink[1];
        }
        $cate->save();
        return redirect()->route('news_cat.index')
            ->with('success', __('admin.update_success'));
    }

    public function destroy($id)
    {
        $cat = NewsCategory::find($id);
        if ($cat) {
            //Kiểm tra con
            NewsCategory::where('parent_id', $cat->id)->delete();
            $cat->delete();
            return redirect()->route('news_cat.index')
                ->with('success', __('admin.delete_success'));
        } else {
            return redirect()->route('news_cat.index')
                ->withErrors(['error' => __('admin.delete_failed')]);
        }

    }
}
