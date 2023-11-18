<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Pertanyaan;
use App\Models\Sekolah;
use App\Models\SurveyRespon;

class DashboardController extends Controller
{
    public function admin()
    {
        $title = "Admin | Dashboard";
        $jumlahSekolah = Sekolah::count();
        $jumlahMurid = Murid::count();
        return view('admin.dashboard', compact('title', 'jumlahSekolah', 'jumlahMurid'));
    }
    public function guru()
    {
        $title = "Guru | Dashboard";
        $jumlahMurid = Murid::where('id_sekolah', auth('sekolah')->user()->id)->count();

        // jumlahKorban
        $korbanRendah = SurveyRespon::korbanRendah()->sekolah()->count();
        $korbanSedang = SurveyRespon::korbanSedang()->sekolah()->count();
        $korbanTinggi = SurveyRespon::korbanTinggi()->sekolah()->count();
        $korbanSangatTinggi = SurveyRespon::korbanSangatTinggi()->sekolah()->count();

        // jumlahPelaku
        $pelakuRendah = SurveyRespon::pelakuRendah()->sekolah()->count();
        $pelakuSedang = SurveyRespon::pelakuSedang()->sekolah()->count();
        $pelakuTinggi = SurveyRespon::pelakuTinggi()->sekolah()->count();
        $pelakuSangatTinggi = SurveyRespon::pelakuSangatTinggi()->sekolah()->count();

        $tipePelaku = Pertanyaan::where('tipe_pertanyaan', 'pelaku')->countPerilaku()->get();

        $pertanyaanTerbanyak = Pertanyaan::where('tipe_pertanyaan', 'pelaku')->countPerilaku()->orderByDesc('jawaban_count')->first();

        return view('sekolah.guru.dashboard', compact('title', 'jumlahMurid', 'korbanRendah', 'korbanSedang', 'korbanTinggi', 'korbanSangatTinggi', 'pelakuRendah', 'pelakuSedang', 'pelakuTinggi', 'pelakuSangatTinggi', 'tipePelaku', 'pertanyaanTerbanyak'));
    }

    public function printChart()
    {
        // jumlahKorban
        $korbanRendah = SurveyRespon::korbanRendah()->sekolah()->count();
        $korbanSedang = SurveyRespon::korbanSedang()->sekolah()->count();
        $korbanTinggi = SurveyRespon::korbanTinggi()->sekolah()->count();
        $korbanSangatTinggi = SurveyRespon::korbanSangatTinggi()->sekolah()->count();

        // jumlahPelaku
        $pelakuRendah = SurveyRespon::pelakuRendah()->sekolah()->count();
        $pelakuSedang = SurveyRespon::pelakuSedang()->sekolah()->count();
        $pelakuTinggi = SurveyRespon::pelakuTinggi()->sekolah()->count();
        $pelakuSangatTinggi = SurveyRespon::pelakuSangatTinggi()->sekolah()->count();

        $tipePelaku = Pertanyaan::where('tipe_pertanyaan', 'pelaku')->countPerilaku()->get();

        $pertanyaanTerbanyak = Pertanyaan::where('tipe_pertanyaan', 'pelaku')->countPerilaku()->orderByDesc('jawaban_count')->first();

        return view('sekolah.guru.printchart', compact('korbanRendah', 'korbanSedang', 'korbanTinggi', 'korbanSangatTinggi', 'pelakuRendah', 'pelakuSedang', 'pelakuTinggi', 'pelakuSangatTinggi', 'tipePelaku', 'pertanyaanTerbanyak'));
    }
}
