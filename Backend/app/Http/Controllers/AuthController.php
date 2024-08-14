<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request) {

    }

    function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request) {
        $request->validate([
            "nama" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect(route("login"))->with("sukses", "User telah dibuat");
        }
        return redirect(route("register"))->with("gagal", "User gagal dibuat");
    }
}
