<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sekolah;
use App\Models\Pertanyaan;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiSurveyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_murid_survey()
    {
        Sanctum::actingAs(Sekolah::factory()->create());
        $pertanyaan = Pertanyaan::factory()->create();
        $dataSurvey = [
            "nisn" => "0986765678",
            "nama_murid" => "ariq alfarizi",
            "kelas" => "8i",
            "id_sekolah" => 1,
            "jenis_kelamin" => "l",
            "survey" => [
                [
                    "id_pertanyaan" => $pertanyaan->id,
                    "skor" => 4,
                    "tipe_pertanyaan" => "korban",
                ]
            ]
        ];

        // Menjalankan metode store dengan data survey uji
        $response = $this->post('/api/survey', $dataSurvey);

        $response->assertStatus(200);
    }
}
