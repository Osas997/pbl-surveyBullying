<?php

namespace Tests\Feature;

use App\Models\Murid;
use App\Models\Pertanyaan;
use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HasilSurveyTest extends TestCase
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

    public function test_login_guru_success()
    {
        $this->test_sekolah_authentication();

        // Data kredensial untuk login guru
        $credentials = [
            'pin_guru' => '232323',
        ];

        // Kirim request POST ke endpoint "/guru/masuk" dengan kredensial
        $response = $this->post('/guru/masuk', $credentials);

        // Assert bahwa session memiliki key 'guru' dengan nilai true
        $this->assertTrue(session('guru', true));

        // Assert bahwa guru diarahkan ke dashboard guru jika autentikasi berhasil
        $response->assertRedirect('/guru/dashboard');
    }

    public function test_view_murid_hasil_korban()
    {
        $this->test_sekolah_authentication();

        $response = $this->get('/murid/hasil-korban');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.hasilKorban');

        $response->assertViewHas(['murid']);
    }

    public function test_view_murid_hasil_pelaku()
    {
        $this->test_sekolah_authentication();

        $response = $this->get('/murid/hasil-pelaku');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.hasilPelaku');

        $response->assertViewHas(['murid']);
    }

    public function test_view_murid_print()
    {
        $this->test_sekolah_authentication();

        $response = $this->get('/murid/print-hasil');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.print_hasil');

        $response->assertViewHas(['murid']);
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
        $response = $this->post('/murid/survey', ['survey' => $dataSurvey]);
    }

    public function test_view_guru_hasil_korban()
    {
        $this->test_murid_survey();

        $this->test_login_guru_success();

        $murid = Murid::latest()->first();

        $response = $this->get('/guru/hasil-korban/' . $murid->id);

        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.guru.hasil_korban_murid');

        $response->assertViewHas(['title', 'murid']);
    }

    public function test_view_guru_hasil_pelaku()
    {
        $this->test_murid_survey();

        $this->test_login_guru_success();

        $murid = Murid::latest()->first();

        $response = $this->get('/guru/hasil-pelaku/' . $murid->id);

        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.guru.hasil_pelaku_murid');

        $response->assertViewHas(['title', 'murid']);
    }
}
