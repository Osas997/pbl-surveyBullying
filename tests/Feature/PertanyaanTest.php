<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Pertanyaan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PertanyaanTest extends TestCase
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
    public function test_view_pertanyaan()
    {
        $this->test_admin_authentication();

        // Kirim request GET ke endpoint "/admin"
        $response = $this->get('/admin/pertanyaan');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('admin.pertanyaan');

        // Assert bahwa variabel yang diharapkan dikirimkan ke view
        $response->assertViewHas(['dataPertanyaan', 'title']);
    }
    public function test_view_create_pertanyaan()
    {
        $this->test_admin_authentication();

        // Kirim request GET ke endpoint "/admin"
        $response = $this->get('/admin/pertanyaan/create');

        // Assert bahwa response memiliki status HTTP 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa view yang diharapkan digunakan
        $response->assertViewIs('admin.addPertanyaan');

        // Assert bahwa variabel yang diharapkan dikirimkan ke view
        $response->assertViewHas(['title']);
    }

    public function test_store_pertanyaan()
    {
        $this->test_admin_authentication();
        // Data yang akan diuji
        $data = [
            "pertanyaan" => "Pertanyaan baru",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ];

        // Menjalankan metode store dengan data uji
        $response = $this->post('/admin/pertanyaan', $data);

        // Memastikan respons redirect ke URL yang benar
        $response->assertRedirect('/admin/pertanyaan');

        // Memeriksa bahwa data berhasil disimpan ke database
        $this->assertDatabaseHas('pertanyaan', $data);

        // Memeriksa pesan sukses
        $response->assertSessionHas('successAdd', 'Pertanyaan Berhasil Di Tambah');
    }

    public function test_update_pertanyaan()
    {
        $this->test_admin_authentication();
        // Membuat data pertanyaan
        $pertanyaan = Pertanyaan::factory()->create();

        // Data yang akan diuji
        $data = [
            "pertanyaan" => "Pertanyaan yang diubah",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "fisik",
        ];

        // Menjalankan metode update dengan data uji
        $response = $this->put("/admin/pertanyaan/{$pertanyaan->id}", $data);

        // Memastikan respons redirect ke URL yang benar
        $response->assertRedirect('/admin/pertanyaan');

        // Memeriksa bahwa data berhasil diubah di database
        $this->assertDatabaseHas('pertanyaan', $data);
    }

    public function test_destroy_pertanyaan()
    {
        $this->test_admin_authentication();
        // Membuat data pertanyaan
        $pertanyaan = Pertanyaan::factory()->create();

        // Menjalankan metode destroy
        $response = $this->delete("/admin/pertanyaan/{$pertanyaan->id}");

        // Memastikan respons redirect kembali
        $response->assertRedirect();

        // Memeriksa bahwa data berhasil dihapus dari database
        $this->assertDatabaseMissing('pertanyaan', ['id' => $pertanyaan->id]);
    }
}
