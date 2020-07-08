<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Profile extends Controller
{
    /**
     *
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return redirect('home');
    }

    public function edit() {
        $user = User::findOrFail(Auth::user()->id);

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function save(Request $request) {
        if(trim($request->get('email')) == "") {
            return back()->with('warning', 'You cannot leave the email field empty.');
        }

        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->update();

        return redirect('home')->with('success', 'Your profile data was updated correctly.');
    }
}
