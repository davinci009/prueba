<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return Inertia::render('roles/Index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return Inertia::render('roles/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $data = $request->only(['name']);
        $data['guard_name'] = 'web';
        Role::create($data);

        return redirect(route('roles.index'));
    }

    public function edit(Role $role)
    {
        return Inertia::render('roles/Edit',
            ['edit_role' => $role]
        );
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $role->name = $request->name;
        $role->save();

        return redirect(route('roles.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('roles.index'));
    }
}
