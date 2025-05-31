<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $role = Role::create($request->only('name', 'app_id'));
        return response()->json($role);
    }

    public function addPermission(Request $request)
    {
        $role = Role::find($request->role_id);
        $permissions = Permission::whereIn('id', $request->permission_ids)->get();
        $role->permissions()->syncWithoutDetaching($permissions);
        return response()->json(['message' => 'Permissions added']);
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->roles()->syncWithoutDetaching([$request->role_id]);
        return response()->json(['message' => 'Role assigned']);
    }
}
