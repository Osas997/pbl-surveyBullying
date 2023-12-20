<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
// use Mpdf\Mpdf;

class LaporanSurvey extends Controller
{
    public function index()
    {
        $namaSekolah = auth('sekolah')->user()->nama_sekolah;
        $title = "Laporan | " .  $namaSekolah;
        $dataSiswa = Murid::with('surveyRespon')->where('id_sekolah', auth('sekolah')->user()->id)->searchFilter(request("search"), request('filter'))->abjad()->get();
        $totalSiswa = Murid::where('id_sekolah', auth('sekolah')->user()->id)->count();
        return view('sekolah.guru.laporan', compact('title', 'dataSiswa', 'namaSekolah', 'totalSiswa'));
    }

    public function print()
    {
        $namaSekolah = auth('sekolah')->user()->nama_sekolah;
        $dataSiswa = Murid::with('surveyRespon')->where('id_sekolah', auth('sekolah')->user()->id)->searchFilter(request("search"), request('filter'))->abjad()->get();
        return view('sekolah.guru.print_laporan', compact('dataSiswa', 'namaSekolah'));
    }
}
