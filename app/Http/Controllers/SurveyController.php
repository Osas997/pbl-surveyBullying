<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Murid;
use App\Models\Pertanyaan;
use App\Models\SurveyRespon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::get();

        return view('sekolah.murid.survey', [
            'title' => 'Survey Test',
            "dataPertanyaan" => $pertanyaan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "survey.*.id_pertanyaan" => "required",
            "survey.*.skor" => "required",
        ]);

        try {
            DB::beginTransaction();

            $dataMurid = request()->session()->get('murid');
            $murid = Murid::create($dataMurid);

            $cookieMurid = Cookie::make('survey_murid', $murid->id, 60);

            $surveyRespon = SurveyRespon::create([
                "id_murid" =>  $murid->id,
                "id_sekolah" => auth("sekolah")->user()->id,
                "skor_total_korban" => 0,
                "skor_total_pelaku" => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);

            $skorTotalKorban = 0;
            $skorTotalPelaku = 0;

            foreach ($request->survey as $survey) {
                Jawaban::create([
                    "id_pertanyaan" => $survey["id_pertanyaan"],
                    "id_survey_respon" => $surveyRespon->id,
                    "skor" => $survey["skor"]
                ]);

                if ($survey["tipe_pertanyaan"] == "korban") {
                    $skorTotalKorban += $survey["skor"];
                } else if ($survey["tipe_pertanyaan"] == "pelaku") {
                    $skorTotalPelaku += $survey["skor"];
                }
            }

            $surveyRespon->update([
                'skor_total_pelaku' => $skorTotalPelaku,
                'skor_total_korban' => $skorTotalKorban
            ]);

            $request->session()->forget('murid');

            DB::commit();
            return redirect()->route('murid.hasilkorban')->withCookie($cookieMurid)->with("success", "Berhasil Menjawab Survey Lihat Skor Di Hasil Survey");
        } catch (\Exception $e) {
            DB::rollback();
            // Anda dapat menambahkan log error atau menampilkan pesan error ke pengguna
            // return back()->withError('Something went wrong.');
            throw $e;  // Atau lemparkan kesalahan untuk debugging lebih lanjut.
        }
    }
}
