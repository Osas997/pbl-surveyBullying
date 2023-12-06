<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Sekolah;

class AuthTest extends TestCase
{
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
            "npsn" => "0987654321", // Ganti dengan npsn yang belum terdaftar
            "password" => "rahasia",
            "nama_sekolah" => "SMP 1 Banyuwangi",
            "alamat_sekolah" => "Kebalenan",
            "status" => "Negeri",
            "pin_guru" => "1234",
        ];

        // Kirim request ke method register dengan data yang telah disiapkan
        $response = $this->post('/register', $data);

        // Pastikan redirect ke route yang sesuai
        $response->assertRedirect(route('viewLogin'));

        // Pastikan bahwa data sekolah sudah tersimpan di database
        $this->assertDatabaseHas('sekolah', ['npsn' => '0987654321', 'nama_sekolah' => 'SMP 1 Banyuwangi']);

        // Optional: Pastikan bahwa session memiliki pesan sukses yang diharapkan
        $response->assertSessionHas('successAddSekolah', 'Sekolah Berhasil Register');

        // Hapus data dari database setelah asert
        $this->assertDatabaseMissing('sekolah', ['npsn' => '0987654321', 'nama_sekolah' => 'SMP 1 Banyuwangi']);
    }


    // public function test_validation()
    // {
    //     // Kirim request dengan data yang tidak valid
    //     $response = $this->post('/register', []);

    //     // Pastikan bahwa response kembali ke halaman sebelumnya
    //     $response->assertRedirect();

    //     // Pastikan bahwa ada pesan kesalahan validasi
    //     $response->assertSessionHasErrors([
    //         "npsn", "password", "nama_sekolah", "alamat_sekolah", "status", "pin_guru"
    //     ]);
    // }
}
