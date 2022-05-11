<?php
namespace App\Modules\Page\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
use App\Http\Controllers\Controller;
use App\Modules\Page\Models\Page;

class PageFrontController extends Controller{

    public function __construct(){
	}


	public function viewpage(Request $request){

        $slug = $request->s_slug;
        $seo_advanced = null;
        if(isset($slug)){
            $page = Page::where('slug', strip_tags($slug))->first();
            if($page){
                return theme_view('pages.page',compact('page','seo_advanced','breadcumbs'));
            }else{
                return redirect()->route('home')->withErrors(['error' => 'Bài viết không tồn tại!']);
            }

        }else{
            return redirect()->route('home')->withErrors(['error' => 'Không tìm thấy trang này!']);
        }

    }
}
