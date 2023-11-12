<?php

namespace App\Http\Controllers;

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
}
