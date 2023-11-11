<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function viewRegister()
    {
        return view("auth.register");
    }

    public function viewLoginGuru()
    {
        return view("auth.loginGuru");
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            "npsn" => "required|unique:sekolah",
            "password" => "required",
            "nama_sekolah" => "required",
            "alamat_sekolah" => "required",
            "status" => "required",
            "pin_guru" => "required",
        ]);

        Sekolah::create($validate);
        return redirect()->route("viewLogin")->with('successAddSekolah', "Sekolah Berhasil Register");
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
            return redirect()->intended("/sekolah/masuk");
        }

        return back()->with("loginError", "Username Atau Password Salah");
    }

    public function loginGuru(Request $request)
    {
        $request->validate([
            'pin_guru' => 'required',
        ]);

        if (Sekolah::where("pin_guru", $request->pin_guru)->where('npsn', auth("sekolah")->user()->npsn)->exists()) {
            $request->session()->put('guru', true);
            return redirect()->intended("/guru/dashboard");
        }

        return back()->with("loginError", "PIN Salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
