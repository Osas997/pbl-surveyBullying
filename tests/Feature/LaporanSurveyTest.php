<?php

namespace Tests\Feature;

use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaporanSurveyTest extends TestCase
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

    public function test_view_guru_laporan()
    {
        $this->test_login_guru_success();

        $response = $this->get('/guru/laporan');

        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.guru.laporan');

        $response->assertViewHas(['title', 'dataSiswa', 'namaSekolah', 'totalSiswa']);
    }

    public function test_view_guru_laporan_print()
    {
        $this->test_login_guru_success();

        $response = $this->get('/guru/print-laporan');

        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.guru.print_laporan');

        $response->assertViewHas(['dataSiswa', 'namaSekolah']);
    }
}
