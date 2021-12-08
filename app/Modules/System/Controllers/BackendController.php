<?php

namespace App\Modules\System\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use DB;
use Cache;
use App\User;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $title = __('backend.dashboard');
        $users = User::orderBy('id','DESC')->limit(5)->get();
        $count_user = User::count();
        return view('System::backend.pages.dashboard', compact('title','users','count_user'));
    }
    protected function updateToggle(Request $request)
    {
        $table = $request->input('table');
        $id = $request->input('id');
        $col = $request->input('col');

        $row = DB::table($table)->where('id', $id)->first();
        if ($row) {
            ($row->$col == 1) ? $update = 0 : $update = 1;
            DB::table($table)->where('id', $id)->update([$col => $update]);
        }
        return "success";
    }

}
