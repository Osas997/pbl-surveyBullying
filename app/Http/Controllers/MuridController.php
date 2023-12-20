<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\SurveyRespon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MuridController extends Controller
{

    public function index()
    {
        $idSekolah = auth('sekolah')->user()->id;

        $daftarMurid = Murid::where("id_sekolah", auth('sekolah')->user()->id)
            ->search(request('search'))
            ->abjad()
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('murid')
                    ->whereColumn('nisn', '=', 'murid.nisn')
                    ->groupBy('nisn');
            })
            ->distinct()
            ->paginate(20);

        $totalSiswa = Murid::where('id_sekolah', $idSekolah)->count();
        $namaSekolah = auth('sekolah')->user()->nama_sekolah;
        $title = "Murid Sekolah | " . $namaSekolah;

        return view("sekolah.guru.murid", compact('daftarMurid', 'title', 'namaSekolah', 'totalSiswa'));
    }

    public function pilihSurvey(Murid $murid)
    {

        if (auth('sekolah')->user()->id != $murid->id_sekolah)
            abort(404, 'Data tidak ditemukan');

        $daftarSurvey = SurveyRespon::whereHas('murid', function ($query) use ($murid) {
            $query->where("id_sekolah", auth('sekolah')->user()->id)->where('nisn', $murid->nisn);
        })->get();

        $title = "Pilih Survey";
        return view('sekolah.guru.pilih_survey', compact('title', 'daftarSurvey'));
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
            "nisn" => "required|min:10|max:10",
            "nama_murid" => "required",
            "kelas" => "required",
            "jenis_kelamin" => "required",
        ]);

        $validate["id_sekolah"] = auth("sekolah")->user()->id;
        $request->session()->put('murid', $validate);
        return redirect()->intended("/murid/survey");
    }
}
