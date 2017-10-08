<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function __construct ()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLogin ()
    {
        return view('auth.login');
    }

    public function login ()
    {
        if(! auth()->attempt(request()->only('email', 'password'), request()->remember))
        {
            session()->flash('msg_error', 'Crudential invalid');
            return back();
        }

        return redirect()->to('/');
    }

    public function logout ()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
