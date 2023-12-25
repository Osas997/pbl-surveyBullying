<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
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
    public function test_admin_dashboard()
    {
        $this->test_admin_authentication();

        // Kirim request GET ke endpoint "/admin"
        $response = $this->get('/admin/dashboard');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('admin.dashboard');

        // Assert bahwa variabel yang diharapkan dikirimkan ke view
        $response->assertViewHas(['title', 'jumlahSekolah', 'jumlahMurid']);

        // Ambil data dari response
        $responseData = $response->original->getData();

        // Assert bahwa title sesuai dengan yang diharapkan
        $this->assertEquals("Admin | Dashboard", $responseData['title']);
    }

    public function test_guru_dashboard()
    {
        $this->test_login_guru_success();

        // Menjalankan metode guru
        $response = $this->get('/guru/dashboard'); // Sesuaikan dengan URL atau rute yang sesuai

        // Memastikan respons HTTP 200 (OK)
        $response->assertStatus(200);

        // Memastikan bahwa data yang diharapkan ada dalam respons
        $response->assertViewHas(['title', 'jumlahMurid', 'korbanRendah', 'korbanSedang', 'korbanTinggi', 'korbanSangatTinggi', 'pelakuRendah', 'pelakuSedang', 'pelakuTinggi', 'pelakuSangatTinggi']);
    }

    public function test_guru_print_chart()
    {
        $this->test_login_guru_success();

        // Menjalankan metode guru
        $response = $this->get('/guru/print-chart'); // Sesuaikan dengan URL atau rute yang sesuai

        // Memastikan respons HTTP 200 (OK)
        $response->assertStatus(200);

        // Memastikan bahwa data yang diharapkan ada dalam respons
        $response->assertViewHas(['korbanRendah', 'korbanSedang', 'korbanTinggi', 'korbanSangatTinggi', 'pelakuRendah', 'pelakuSedang', 'pelakuTinggi', 'pelakuSangatTinggi']);
    }
}
