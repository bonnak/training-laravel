<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::with([ 'roles', 'blogs' ])->get();

        return view('users', compact('users'));
    }

    public function edit ($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();

        return view('user-edit', compact('user', 'roles'));
    }
    public function update($id)
    {
        $user = User::find($id);
        $user->name = request()->name;
        $user->save();

        $user->roles()->sync(request()->roles);

        return back();
    }

}
