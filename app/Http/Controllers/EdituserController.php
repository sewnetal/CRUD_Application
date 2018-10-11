<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class EdituserController extends Controller
{

    protected function edit()
    {
        return view('auth.edit_user', compact('user'));

    }
    protected function update(User $user)
    {
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:6|confirmed',

        ]);
        $user = User::find($user)->first();
        $user->name = Input::get('name');
        $user->email  = Input::get('email');
        $user->password  = Hash::make(Input::get('password'));
        $user->save();

        return redirect('/')->with('success', 'Post updated');

    }

    public function destroy(User $user)
    {
        $user = User::find($user)->first();
        $user->delete();


        return redirect('/');

    }
}
