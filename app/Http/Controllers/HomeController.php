<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $this->allpermission();
        return view('dashboard');
    }

    public function allpermission()
    {
        $permissions = Permission::all();
        $superAdminRole = Role::findOrFail('1');
        $superAdminRole->syncPermissions($permissions);
    }
   
}
