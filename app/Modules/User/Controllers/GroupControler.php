<?php
namespace App\Modules\User\Controllers;

use App\Modules\User\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class GroupControler extends Controller
{

    public function index(){
        $groups = Group::all();
        return view("User::group.index",compact('groups'));
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function edit(){

    }
    public function update(){

    }
}
