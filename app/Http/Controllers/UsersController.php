<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User Make Admin Successfully !!! ');

        return redirect(route('users.index'));
    }
}
