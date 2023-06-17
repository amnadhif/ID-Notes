<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('/note');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect('/note');
        }

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect('note');
        } else {
            return redirect('login')->with('error_message', 'wrong email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function register_form()
    {
        if (Auth::check()) {
            return redirect('/note');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect('/note');
        }

        $request->validate([
            'name'     => 'required|min:3|max:20',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:4|max:10|confirmed'
        ]);

        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}
