<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function index()
    {
        return view('./auth/register/register', [
            "title" => "Register",
        ]);
    }

    public function store(Request $request)
{
    $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5|max:255|confirmed',
    ];

    $messages = [
        'email.unique' => 'The email address is already in use.',
        'password.confirmed' => 'The password confirmation does not match.',
    ];

    $request->validate($rules, $messages);

    $request->merge([
        'password' => Hash::make($request->password)
    ]);

    try {
        User::create($request->all());
        return redirect('/login')->with('success', 'Berhasil register!');
    } catch (\Exception $e) {
        if ($e instanceof ValidationException) {
            // Handle validation exception with more specific error message
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        return redirect()->back()->with('error', 'Gagal register. Silakan coba lagi.');
    }
}



}
