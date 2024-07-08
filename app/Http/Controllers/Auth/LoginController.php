<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('links.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales Incorrectas',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
