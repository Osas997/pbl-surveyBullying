<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Http\Resources\SurveyResponResource;
use App\Models\Jawaban;
use App\Models\Murid;
use App\Models\SurveyRespon;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function store(SurveyRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataMurid = [
                "nisn" => $request->nisn,
                "nama_murid" => $request->nama_murid,
                "kelas" => $request->kelas,
                "jenis_kelamin" => $request->jenis_kelamin,
                "id_sekolah" => $request->id_sekolah
            ];

            $murid = Murid::create($dataMurid);

            $surveyRespon = SurveyRespon::create([
                "id_murid" =>  $murid->id,
                "id_sekolah" => auth()->user()->id,
                "skor_total_korban" => 0,
                "skor_total_pelaku" => 0
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

            DB::commit();

            return (new SurveyResponResource($surveyRespon->load('murid')))->response()->setStatusCode(200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
}
