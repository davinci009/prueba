<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return Inertia::render('users/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return Inertia::render('users/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,visitante,publicador'
        ]);

        $data = $request->only(['name', 'email']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if($user){
            $user->assignRole($request->role);
        }

        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        return Inertia::render('users/Edit',
            ['edit_user' => $user->load('roles')]
        );
    }

    public function destroy(User $user)
    {
        $user->syncRoles([]);
        // $user->posts->delete();
        if($user->delete()){
            return redirect(route('users.index'));
        }

        abort(500, 'Ocurrio un error');
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|in:admin,visitante,publicador'
        ]);

        $data = $request->only(['name', 'email']);

        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->fill($data);
        $user->save();
        $user->syncRoles($request->role);

        return redirect(route('users.index'));

    }
}