<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $value = $request->cookie('email');
        // dd($value);
        return view("pages.login")->with("email_cookie", $value);

        // return view("pages.login");
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', "email"],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->EmailCheck1 == "on") {
                return redirect("/products")->withCookie(cookie('email', $request->email, 525600));
            } else {
                $cookie = \Illuminate\Support\Facades\Cookie::forget('email');
                return redirect("/products")->withCookie($cookie);;
            }
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
