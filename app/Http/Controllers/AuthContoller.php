<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard("admin")->attempt(["username" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        if (Auth::guard("sekolah")->attempt(["npsn" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/sekolah/dashboard');
        }

        if (Auth::guard("guru")->attempt(["nuptk" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/guru/dashboard');
        }

        if (Auth::guard("murid")->attempt(["nisn" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/murid/dashboard');
        }

        return back()->with("loginError", "Username Atau Password Salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
