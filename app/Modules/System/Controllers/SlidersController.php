<?php

namespace App\Modules\System\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Language\Models\Language;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Modules\System\Models\Sliders;
use Storage;

class SlidersController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Sliders::orderBy('id', 'DESC')->paginate(10);
        return view("System::slider.index", compact('sliders'));
    }

    public function create()
    {
        $langs = Language::all();
        return view('System::slider.create', compact('langs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slider_name' => 'required|max:255',
            'slider_image' => 'required'
        ]);
        $input = $request->all();

        if ($request->slider_image) {
            $imagelink = explode('storage', $request->slider_image);
            $input['slider_image'] = '/storage' . $imagelink[1];
        }
        Sliders::create($input);
        return redirect()->route('sliders.index')
            ->with('success', 'Slider created successfully');
    }

    public function edit($id)
    {
        $slider = Sliders::find($id);
        $langs = Language::orderBy('default', 'desc')->get();
        return view('System::slider.edit', compact('slider', 'langs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slider_name' => 'required|max:255'
        ]);

        /* update Slider Data */
        $slider = Sliders::find($id);
        $slider->slider_name = $request->slider_name;

        if ($request->slider_image) {
            $imagelink = explode('storage', $request->slider_image);
            $slider->slider_image = '/storage' . $imagelink[1];
        }

        $slider->slider_text = $request->slider_text;
        $slider->slider_btn_text = $request->slider_btn_text;
        $slider->slider_btn_url = $request->slider_btn_url;
        $slider->sort_order = $request->sort_order;
        $slider->lang = $request->lang;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('sliders.index')
            ->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        Sliders::find($id)->delete();
        return redirect()->route('sliders.index')
                ->with('success', 'Slider deleted successfully');
    }

    public function actions(Request $request)
    {
        $val = $request->check;
        $action = $request->action;
        if (empty($val)) {
            return redirect()->route('sliders.index')->withErrors(['message' => 'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $sliders = Sliders::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('sliders.index')->with('success', 'Slider ' . $action . ' successfully');
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
