<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailVerification;

use Illuminate\Bus\Queu;
use Carbon\Carbon;
use App\Jobs\SendReminderEmail;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::with([ 'roles', 'posts' ])->get();

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

    public function create ()
    {
        $roles = Role::all();

        return view('user-create', compact('roles'));
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:10|regex:/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/',
            'password_again' => 'same:password'
        ], [
            'name.required' => 'Name required',
            'password.required' => ':attribute required',
            'password.min' => 'At least :min characters',
            'password.max' => 'Mut less than :max characters',
            'password.regex' => 'Password must have at least a character, number'
        ]);

        $user = User::create($request->all());

        $user->roles()->sync($request->roles);


        Mail::to($user->email)->queue(new MailVerification($user, [ 'date' => '2017-01-01']));
        // SendReminderEmail::dispatch($user)->delay(Carbon::now()->addSeconds(10));

        return redirect()->route('user');
    }
}
