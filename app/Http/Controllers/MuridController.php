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

    public function store(Request $request)
    {
        // dd($request->all());
        $validate =  $request->validate([
            "nisn" => "required",
            "nama_murid" => "required",
            "kelas" => "required",
            "jenis_kelamin" => "required",
        ]);

        $validate["id_sekolah"] = auth("sekolah")->user()->id;
        $murid = Murid::create($validate);
        $request->session()->put('murid', $murid->id);
        return redirect()->intended("/murid/survey");
    }
}
