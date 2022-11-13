<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("pages.register");
    }
    public function handleRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', "email", "unique:users"],
            'password' => ['required', "min:8", "confirmed"],
            'password_confirmation' => ['required', "min:8"],
            'address' => ['required', 'min:15'],
            'phone' => ['required', "numeric", "min:11"]
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        $request->session()->flash('alert', 'Sign Up Sucessful!');
        return redirect("/login");
    }
}
