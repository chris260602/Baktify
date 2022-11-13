<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.login");
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', "email"],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/products");
        }
        return back()->with('loginError', 'Invalid Email or Password');
    }
    public function logoff(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/home");
    }
}
