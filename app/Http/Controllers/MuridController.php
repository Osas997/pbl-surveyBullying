<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{

    public function index()
    {
        return view("sekolah.murid.signup");
    }

    public function dashboard()
    {
        return "h3h3";
        // return view("sekolah.murid.dashboard");
    }

    public function store(Request $request)
    {
        $validate =  $request->validate([
            "nisn" => "required",
            "nama_murid" => "required",
            "kelas" => "required",
            "jenis_kelamin" => "required",
        ]);

        $validate["id_sekolah"] = auth("sekolah")->user()->id;
        $request->session()->put('murid', $validate);
        return redirect()->intended("/murid/survey");
    }
}
