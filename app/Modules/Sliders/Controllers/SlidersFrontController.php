<?php
namespace App\Modules\Sliders\Controllers;

use App\Http\Controllers\Controller;
use View;
use App;
use App\Modules\Sliders\Models\Sliders;

class SlidersFrontController extends Controller{

	public function renderSlider(){

		$sliders = Sliders::where('status',1)->orderBy('sort_order','ASC')->where('lang', App::getLocale())->get();
		return $sliders;
	}

}