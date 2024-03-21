<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Delete Control', ['only' => ['distroy']]);
        $this->middleware('permission:Create User', ['only' => ['store', 'create']]);
        $this->middleware('permission:Update Control', ['only' => ['update', 'edit']]);
        $this->middleware('permission:User Control', ['only' => ['index']]);
    }


    public function index()
    {
        $users = User::get();
        
        return view('role-permission.user.index', [
            'users' => $users,
        ]);

    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        return redirect('users')->with('status', 'User created successfully with roles');
    }

    public function edit(user $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password)
            ];
        }
        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('users')->with('status', 'User updated successfully with roles');
    }

    public function distroy($userid)
    {
        $user = User::findOrFail($userid);
        $user->delete();
        return redirect('/users')->with('status', 'User deleted Successfully');
    }

    
}
