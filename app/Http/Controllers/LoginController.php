<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('./auth/login/login', [
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (empty($cred['email']) || empty($cred['password'])) {
            return back()->with('error', 'Email dan password harus diisi');
        }

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Login Failed! Try Again');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
