<?php

namespace Tests\Feature;

use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class MuridTest extends TestCase
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

    public function test_index_guru()
    {
        $this->test_login_guru_success();

        $response = $this->get('/guru/murid');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.guru.murid');

        // Assert bahwa variabel yang diharapkan dikirimkan ke view
        $response->assertViewHas(['daftarMurid', 'title', 'namaSekolah', 'totalSiswa']);
    }
    public function test_view_murid_welcome()
    {
        $this->test_sekolah_authentication();

        $response = $this->get('/murid/welcome');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.index');
        $response->assertViewHas(['murid']);
    }

    public function test_view_murid_signup()
    {
        $this->test_sekolah_authentication();

        $response = $this->get('/murid/signup');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('sekolah.murid.signup');
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
}
