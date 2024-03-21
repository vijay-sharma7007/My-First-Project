<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Delete Control', ['only' => ['distroy']]);
        $this->middleware('permission:Create Permission', ['only' => ['store', 'create']]);
        $this->middleware('permission:Update Control', ['only' => ['update', 'edit']]);
        $this->middleware('permission:permissions Control', ['only' => ['index']]);
    }


    public function index()
    {
        $permission = Permission::get();
        return view('role-permission.permission.index', [
            'permission' => $permission
        ]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name']
        ]);
        Permission::create([
            'name' => $request->name
        ]);
        return redirect('permission')->with('status', 'Permission created successfully');
    }

    public function edit(permission $permission)
    {
        return view('role-permission.permission.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' . $permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permission')->with('status', 'Permission updated successfully');
    }

    public function distroy($permissionid)
    {
        $permission = Permission::find($permissionid);
        $permission->delete();
        return redirect('permission')->with('status', 'Permission deleted successfully');
    }
}
