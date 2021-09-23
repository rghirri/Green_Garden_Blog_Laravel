<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Users\UpdateProfileRequest;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name'  =>  $request->name,
            'about' =>  $request->about
        ]);

        // flash message
        session()->flash('success', 'User Profile Updated Successfully.');

        return redirect()->back();
    }


    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        // flash message
        session()->flash('success', 'Admin user created successfully.');

        return redirect(route('users.index'));
    }
    public function makeWriter(User $user)
    {
        $user->role = 'writer';

        $user->save();

        // flash message
        session()->flash('success', 'Writer user created successfully.');

        return redirect(route('users.index'));
    }

}