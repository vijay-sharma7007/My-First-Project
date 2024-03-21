<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Delete Control', ['only' => ['distroy']]);
        $this->middleware('permission:Create Role', ['only' => ['store', 'create']]);
        $this->middleware('permission:Update Control', ['only' => ['update', 'edit']]);
        $this->middleware('permission:give-Permissions', ['only' => ['givPermissionToRole']]);
        $this->middleware('permission:permissions Control', ['only' => ['index', 'addPermissionToRole']]);
    }

    public function index()
    {
        $role = Role::get();
        return view('role-permission.role.index', [
            'role' => $role
        ]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name']
        ]);
        Role::create([
            'name' => $request->name
        ]);
        return redirect('role')->with('status', 'role created successfully');
    }

    public function edit(role $role)
    {
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('role')->with('status', 'role updated successfully');
    }

    public function distroy($roleid)
    {
        $role = Role::find($roleid);
        $role->delete();
        return redirect('role')->with('status', 'role deleted successfully');
    }

    public function addPermissionToRole($roleid)
    {
        $permission = Permission::get();
        $role = Role::findOrfail($roleid);
        $rolePermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role->id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
        return view('role-permission.role.add-permission', [
            'role' => $role,
            'permission' => $permission,
            'rolePermission' => $rolePermission
        ]);
    }
    public function givPermissionToRole(request $request, $roleid)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleid);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permission added to role');
    }
}
