<?php
namespace App\Modules\User\Controllers;

use App\Modules\System\Controllers\BackendController;
use App\Modules\User\Models\Group;
use Illuminate\Http\Request;
use DB;
use Hash;

class GroupControler extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

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
