<?php
namespace App\Modules\System\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Validator;

class PermissionController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        // Chỉ SUPER_ADMIN mới có quyền thao tác ở đây
        $this->middleware(['role:ADMINISTRATOR']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý quyền hạn";

        ///Gán cho Super admin toàn bộ quyền của hệ thống
        $pers = Permission::pluck('name')->toArray();
        $adminrole = Role::where('name', 'ADMINISTRATOR')->first();
        $adminrole->syncPermissions($pers);

        $permissions = Permission::orderBy('id','ASC')->paginate(10);
        //Search keyword
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $permissions = Permission::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
        }
        return view('System::permissions.index',compact('permissions', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Permission";
        return view('System::permissions.create',compact('title','permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name'       => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);
        if ($validatedData->fails()) {
            return redirect()->route('permissions.create')->withErrors($validatedData)->withInput();
        }

        $input = $request->all();;

        $role = Permission::create($input);
        return redirect()->route('permissions.index')->with('success','Permision created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('System::roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Permissions Management";
        $permission = Permission::find($id);
        return view('System::permissions.edit',compact('title','permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $validatedData = Validator::make($request->all(),
        [
            'name'       => 'required|unique:permissions,name,'.$id,
            'guard_name' => 'required',
        ]);

        if ($validatedData->fails()) {
            return redirect()->route('permissions.edit', ['id' => $id])->withErrors($validatedData)->withInput();
        }

        $permission              = Permission::find($id);
        $permission->name        = $request->input('name');
        $permission->guard_name  = $request->input('guard_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }

    public function actions(Request $request)
    {
        $val    = $request->check;
        $action = $request->action;
        if(empty($val)){
            return redirect()->route('permissions.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $user = Permission::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('permissions.index')->with('success','Permission '.$action.' successfully');
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