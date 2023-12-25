<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Sekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SekolahTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
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

    public function test_view_sekolah()
    {
        $this->test_sekolah_authentication();
        // Memanggil route atau action yang sesuai dengan method login
        $response = $this->get('/sekolah/masuk');

        // Memastikan response status adalah 200 (OK)
        $response->assertStatus(200);

        $response->assertViewIs('sekolah.index');
    }
    public function test_view_admin_sekolah()
    {
        $this->test_admin_authentication();

        // Kirim request GET ke endpoint "/admin"
        $response = $this->get('/admin/sekolah');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('admin.sekolah');

        // Assert bahwa variabel yang diharapkan dikirimkan ke view
        $response->assertViewHas(['dataSekolah', 'title']);
    }

    public function test_update_pertanyaan()
    {
        $this->test_admin_authentication();

        $sekolah = Sekolah::factory()->create();

        // Data yang akan diuji
        $data = [
            "npsn" => "98292828",
            "nama_sekolah" => "SMP 1 Mancing Edit",
            "alamat_sekolah" => "Kebalenan",
            "status" => "Negeri",
            "pin_guru" => "232323",
        ];

        // Menjalankan metode update dengan data uji
        $response = $this->patch("/admin/sekolah/{$sekolah->id}", $data);

        // Memastikan respons redirect ke URL yang benar
        $response->assertRedirect('/admin/sekolah');

        // Memeriksa bahwa data berhasil diubah di database
        $this->assertDatabaseHas('sekolah', $data);
    }

    public function test_destroy_sekolah()
    {
        $this->test_admin_authentication();
        // Membuat data pertanyaan
        $sekolah = Sekolah::factory()->create();

        // Menjalankan metode destroy
        $response = $this->delete("/admin/sekolah/{$sekolah->id}");

        // Memastikan respons redirect kembali
        $response->assertRedirect();

        // Memeriksa bahwa data berhasil dihapus dari database
        $this->assertDatabaseMissing('sekolah', ['id' => $sekolah->id]);
    }
}
