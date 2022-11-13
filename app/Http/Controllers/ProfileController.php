<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view("pages.profile.profile");
    }
    public function viewUpdate()
    {
        return view("pages.profile.updateProfile");
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'password' => ['required', "min:8", "confirmed"],
            'password_confirmation' => ['required', "min:8"],
            'address' => ['required', 'min:15'],
            'phone' => ['required', "numeric", "min:11"]
        ]);
        $validated['password'] = Hash::make($validated['password']);
        DB::table('users')->where('email', $request->email)->update([
            'name' => $request->name,
            'password' => Hash::make($validated['password']),
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        echo "<script>
                alert('Sucessfully update your profile');
                window.location.href='/profile';
              </script>";
    }
}
