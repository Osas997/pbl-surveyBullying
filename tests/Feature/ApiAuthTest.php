<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sekolah;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_login(): void
    {
        Sekolah::factory()->create();
        // Data kredensial untuk login
        $credentials = [
            'username' => '12345678',
            'password' => 'rahasia',
        ];

        // Kirim request POST ke endpoint "/login" dengan kredensial
        $response = $this->post('/api/login', $credentials);

        $response->assertStatus(200);
    }

    public function test_logout()
    {
        // Create a user and authenticate
        Sanctum::actingAs(Sekolah::factory()->create());

        // Call the logout endpoint
        $response = $this->postJson('/api/logout');

        // Assert that the response has a success message
        $response->assertJson(['message' => 'Token Berhasil Dihapus']);

        // Assert that the user's tokens are revoked
        $this->assertCount(0, auth()->user()->tokens);
    }
}
