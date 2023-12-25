<?php

namespace Tests\Feature;

use App\Models\Pertanyaan;
use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_sekolah_authentication()
    {
        Sekolah::factory()->create();
        // Data kredensial untuk login
        $credentials = [
            'username' => '12345678',
            'password' => 'rahasia',
        ];

        // Kirim request POST ke endpoint "/login" dengan kredensial
        $response = $this->post('/login', $credentials);

        // Assert bahwa pengguna diarahkan ke dashboard sekolah jika autentikasi berhasil
        $response->assertRedirect('/sekolah/masuk');
    }

    public function test_store_murid()
    {
        $this->test_sekolah_authentication();

        $data = [
            "nisn" => "8372837283",
            "nama_murid" => "John Doe",
            "kelas" => "XII",
            "jenis_kelamin" => "l",
            "id_sekolah" => auth('sekolah')->user()->id
        ];

        // Menjalankan metode store dengan data uji
        $response = $this->post('/murid/signup', $data);

        // Memastikan respons redirect ke URL yang benar
        $response->assertRedirect('/murid/survey');

        // Memeriksa bahwa data murid disimpan di dalam session
        $this->assertEquals($data, Session::get('murid'));
    }

    public function test_view_murid_survey()
    {

        $this->test_store_murid();

        $response = $this->get('/murid/survey');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.survey');
        $response->assertViewHas(['title', 'dataPertanyaan']);
    }

    public function test_murid_survey()
    {
        $this->test_store_murid();
        $pertanyaan = Pertanyaan::factory()->create();
        $dataSurvey = [
            [
                "id_pertanyaan" => $pertanyaan->id,
                "skor" => 4,
                "tipe_pertanyaan" => "korban",
            ],
        ];

        // Menjalankan metode store dengan data survey uji
        $response = $this->post('/murid/survey', ['survey' => $dataSurvey]);

        // Memastikan   respons redirect ke route yang benar
        $response->assertRedirect(route('murid.hasilkorban'));

        // Memeriksa bahwa data murid sudah dihapus dari session
        $this->assertNull(session('murid'));

        // Memeriksa bahwa pesan sukses ada di dalam session
        $response->assertSessionHas('success', 'Berhasil Menjawab Survey Lihat Skor Di Hasil Survey');
    }
}
