<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\SurveyRespon;
use Illuminate\Http\Request;

class MuridController extends Controller
{

    public function index()
    {
        $daftarMurid = Murid::where("id_sekolah", auth('sekolah')->user()->id)->search(request('search'))->abjad()->paginate(20);
        $totalSiswa = Murid::where('id_sekolah', auth('sekolah')->user()->id)->count();
        $namaSekolah = auth('sekolah')->user()->nama_sekolah;
        $title =  "Murid Sekolah | " .  $namaSekolah;

        return view("sekolah.guru.murid", compact('daftarMurid', 'title', 'namaSekolah', 'totalSiswa'));
    }
    public function signup()
    {
        return view("sekolah.murid.signup");
    }

    public function welcome(Request $request)
    {
        $cookieMurid = $request->cookie('survey_murid');
        $murid = SurveyRespon::where('id_murid', $cookieMurid)->first();

        return view("sekolah.murid.index", compact('murid'));
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
