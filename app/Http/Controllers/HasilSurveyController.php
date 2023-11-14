<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\SurveyRespon;
use Illuminate\Http\Request;


class HasilSurveyController extends Controller
{
    public function korban(Request $request)
    {
        $cookieMurid = $request->cookie('survey_murid');
        $murid = SurveyRespon::where('id_murid', $cookieMurid)->first();

        return view('sekolah.murid.hasilKorban', compact('murid'));
    }
    public function pelaku(Request $request)
    {
        $cookieMurid = $request->cookie('survey_murid');
        $murid = SurveyRespon::where('id_murid', $cookieMurid)->first();

        return view('sekolah.murid.hasilPelaku', compact('murid'));
    }

    public function guruKorban(Murid $murid)
    {
        $dataLaporan = SurveyRespon::with(['jawaban', 'jawaban.pertanyaan'])->where("id_murid", $murid->id)->first();
        return view("sekolah.guru.hasil_korban_murid", [
            "title" => "Hasil Survey Murid",
            "murid" => $dataLaporan,
        ]);
    }
    public function guruPelaku(Murid $murid)
    {
        $dataLaporan = SurveyRespon::with(['jawaban', 'jawaban.pertanyaan'])->where("id_murid", $murid->id)->first();
        return view("sekolah.guru.hasil_pelaku_murid", [
            "title" => "Hasil Survey Murid",
            "murid" => $dataLaporan,
        ]);
    }
}
