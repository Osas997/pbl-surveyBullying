<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Sekolah;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_login_view()
    {
        // Memanggil route atau action yang sesuai dengan method login
        $response = $this->get('/login');

        // Memastikan response status adalah 200 (OK)
        $response->assertStatus(200);

        // Memastikan bahwa view "auth.login" digunakan
        $response->assertViewIs('auth.login');
    }

    public function test_register_view()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

        $response->assertViewIs('auth.register');
    }

    public function test_register()
    {
        // Persiapkan data yang akan diuji
        $data = [
            "npsn" => "89283928", // Ganti dengan npsn yang belum terdaftar
            "password" => "rahasia",
            "nama_sekolah" => "SMP 1 Banyuwangi",
            "alamat_sekolah" => "Kebalenan",
            "status" => "Negeri",
            "pin_guru" => "123456",
        ];

        // Kirim request ke method register dengan data yang telah disiapkan
        $response = $this->post('/register', $data);

        // Pastikan redirect ke route yang sesuai
        $response->assertRedirect(route('viewLogin'));

        // Pastikan bahwa data sekolah sudah tersimpan di database
        $this->assertDatabaseHas('sekolah', ['npsn' => '89283928', 'nama_sekolah' => 'SMP 1 Banyuwangi']);

        // Optional: Pastikan bahwa session memiliki pesan sukses yang diharapkan
        $response->assertSessionHas('successAddSekolah', 'Sekolah Berhasil Register');

        // Hapus data dari database setelah asert
        $this->assertDatabaseMissing('sekolah', ['npsn' => '0987654321', 'nama_sekolah' => 'SMP 1 Banyuwangi']);
    }


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

    public function test_admin_authentication()
    {
        Admin::factory()->create();

        $credentials = [
            'username' => '123',
            'password' => '123',
        ];

        // Kirim request POST ke endpoint "/login" dengan kredensial
        $response = $this->post('/login', $credentials);

        // Assert bahwa pengguna diarahkan ke dashboard sekolah jika autentikasi berhasil
        $response->assertRedirect('/admin/dashboard');
    }

    public function test_gagal_authentication()
    {
        // Data kredensial untuk login
        $credentials = [
            'username' => 'invalid',
            'password' => 'invalid',
        ];

        // Kirim request POST ke endpoint "/login" dengan kredensial
        $response = $this->post('/login', $credentials);

        // Assert bahwa pengguna diarahkan ke dashboard sekolah jika autentikasi berhasil
        $response->assertRedirect();
        $response->assertSessionHas('loginError', 'Username Atau Password Salah');
    }

    public function test_login_guru_view()
    {
        $this->test_sekolah_authentication();
        $response = $this->get('/guru/masuk');

        $response->assertStatus(200);

        $response->assertViewIs('auth.loginGuru');
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

    public function test_logout()
    {
        $this->test_sekolah_authentication();

        $response = $this->post('/logout');

        // Assert bahwa user sudah logout
        $this->assertGuest();

        // Assert bahwa user diarahkan ke halaman utama setelah logout
        $response->assertRedirect('/');
    }
}
