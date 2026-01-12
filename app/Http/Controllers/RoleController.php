<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('role.index', [
            'roles' => $roles,
        ]);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('role.show', [
            'role' => $role,
        ]);
    }
}
