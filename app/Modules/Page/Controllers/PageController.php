<?php

namespace App\Modules\Page\Controllers;

use App\Modules\System\Controllers\BackendController;
use App\Modules\System\Models\Language;
use Illuminate\Http\Request;
use Auth;
use View;
use DB;
use App\Modules\Page\Models\Page;


class PageController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $staticPage = Page::orderBy('id', 'DESC')->paginate(20);
        if ($request->input('keyword') != '') {
            $keyword = $request->input('keyword');
            $title = "Search: ";
            $staticPage = Page::where('title', 'LIKE', '%' . $keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate(20);
            $title .= $keyword;
        }

        return view("Page::index", compact('title', 'staticPage'));
    }


    public function create()
    {

        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default', 'desc')->get()->toArray();

        return view('Page::create', compact('languages'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:pages|max:255',
            'language' => 'required',
            'description' => 'required'
        ]);
        $input = $request->all();
        $input['created_at'] = now();
        $input['updated_at'] = now();

        DB::beginTransaction();
        try {
            Page::create($input);
            /** end save news tags **/
            DB::commit();
            return redirect()->route('pages.index')
                ->with('success', 'Create success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('pages.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $staticPage = Page::find($id);
        $languages = Language::where('status', 1)->select('name', 'code')->orderBy('default')->get()->toArray();
        return view('Page::edit', compact('staticPage', 'languages'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|max:255',
        ]);

        $page = Page::find($id);

        $page->slug = $request->slug;
        $page->meta = $request->meta;
        $page->title = $request->title;
        $page->description = $request->input('description');
        $page->html_description = $request->input('html_description');
        $page->language = $request->language;
        $page->status = $request->status;
        $page->update();

        /** save news tags **/
        return redirect()->route('pages.index')
            ->with('success', 'Updated success');
    }

    public function destroy($id)
    {
        Page::find($id)->delete();
        return redirect()->route('pages.index')
            ->with('success', 'Delete success');
    }

    public function actions(Request $request)
    {

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


}
