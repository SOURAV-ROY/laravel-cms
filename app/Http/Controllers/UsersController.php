<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('users.edit')->with('user', Auth::user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([

            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'User Profile Updated Successfully');

        return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'Make Admin Successfully !!! ');

        return redirect(route('users.index'));
    }
}
