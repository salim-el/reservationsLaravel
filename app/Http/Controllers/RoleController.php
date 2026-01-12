<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('role.index', [
            'roles' => $roles,
            'resource' => 'roles',
        ]);
    }

    public function show(string $id)
    {
        $role = Role::findOrFail($id);

        return view('role.show', [
            'role' => $role,
        ]);
    }

    public function create() {}
    public function store(\Illuminate\Http\Request $request) {}
    public function edit(string $id) {}
    public function update(\Illuminate\Http\Request $request, string $id) {}
    public function destroy(string $id) {}
}
