<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nisn" => "required",
            "nama_murid" => "required",
            "kelas" => "required",
            "jenis_kelamin:" => "required",
            "id_sekolah" => auth("sekolah")->user()->id,
        ]);

        $murid = Murid::create($validate);
        $request->session()->put('murid', $murid->id);
        return redirect()->intended("/murid/survey");
    }
}
