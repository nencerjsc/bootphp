<?php
namespace App\Modules\User\Controllers;

use App\Modules\System\Controllers\BackendController;
use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;

class UserController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
        return view('User::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('User::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        User::create($input);
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('User::edit',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

    public function actions(Request $request)
    {
        $val = $request->check;
        $action = $request->action;
        if (empty($val)) {
            return redirect()->route('users.index')->withErrors(['message' => 'Không có mục nào được chọn.']);
        }
        $user = User::whereIn('id',$val)->delete();
        return redirect()->route('users.index')->with('success', 'Group  ' . $action . ' successfully');
    }
}
