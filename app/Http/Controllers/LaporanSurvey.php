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
        $dataSiswa = Murid::with('surveyRespon')->where('id_sekolah', auth('sekolah')->user()->id)->search(request("search"))->abjad()->get();
        $totalSiswa = Murid::where('id_sekolah', auth('sekolah')->user()->id)->count();
        return view('sekolah.guru.laporan', compact('title', 'dataSiswa', 'namaSekolah', 'totalSiswa'));
    }

    public function print()
    {
        $namaSekolah = auth('sekolah')->user()->nama_sekolah;
        $dataSiswa = Murid::with('surveyRespon')->where('id_sekolah', auth('sekolah')->user()->id)->search(request("search"))->abjad()->get();
        return view('sekolah.guru.print_laporan', compact('dataSiswa', 'namaSekolah'));
    }

    // public function downloadPdf()
    // {

    //     $namaSekolah = auth('sekolah')->user()->nama_sekolah;
    //     $title = "Laporan | " .  $namaSekolah;
    //     $dataSiswa = Murid::with('surveyRespon')->where('id_sekolah', auth('sekolah')->user()->id)->search(request("search"))->abjad()->get();
    //     $totalSiswa = Murid::where('id_sekolah', auth('sekolah')->user()->id)->count();

    //     // $data = [
    //     //     'title' => $title,
    //     //     'dataSiswa' => $dataSiswa,
    //     //     'totalSiswa' => $totalSiswa,
    //     //     'namaSekolah' => $namaSekolah
    //     // ];

    //     // Create mPDF object
    //     $mpdf = new Mpdf();

    //     // Load HTML content into mPDF
    //     $mpdf->WriteHTML(view('sekolah.guru.laporan', compact('title', 'dataSiswa', 'namaSekolah', 'totalSiswa')));

    //     // Output the PDF as a download (inline)
    //     $mpdf->Output('Laporan.pdf', 'D');
    // }
}
