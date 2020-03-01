<?php
namespace App\Modules\System\Controllers;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class RoleController extends BackendController
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
        $title = "Quản lý vai trò";

        ///Gán cho Super admin toàn bộ quyền của hệ thống
        $pers = Permission::pluck('name')->toArray();
        $adminrole = Role::where('name', 'ADMINISTRATOR')->first();
        $adminrole->syncPermissions($pers);

        $roles = Role::orderBy('id', 'DESC')->paginate(10);

        //Search keyword
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $title = "Search: " . $keyword;
            $roles = Role::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(10);
        }

        foreach ($roles as $role) {

            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();
            if (count($rolePermissions) > 0) {
                $pml = array();
                foreach ($rolePermissions as $pmid) {
                    $pm = Permission::find($pmid);
                    $pml[] = $pm->name;
                }
                $role->permission = implode(", ", $pml);
            } else {
                $role->permission = null;
            }
        }

        $backendUrl = config('app.backendRoute');
        return view('System::roles.index', compact('roles', 'title', 'backendUrl'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $title = 'Thêm vai trò';
        return view('System::roles.create', compact('title', 'permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name'), 'guard_name' => $request->input('guard_name'), 'description' => $request->description]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success', 'Vai trò được thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('System::roles.show', compact('role', 'rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa vai trò";
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('System::roles.edit', compact('title', 'role', 'permission', 'rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $role->description = $request->input('description');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success', 'Sửa vai trò thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Xóa vai trò thành công');
    }

}