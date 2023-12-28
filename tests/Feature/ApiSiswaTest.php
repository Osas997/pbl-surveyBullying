<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sekolah;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiSiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_store_with_valid_data()
    {
        // Authenticated user
        Sanctum::actingAs(Sekolah::factory()->create());

        // Valid data for the request
        $validData = [
            "nisn" => "1234567890",
            "nama_murid" => "John Doe",
            "kelas" => "12A",
            "jenis_kelamin" => "Laki-laki",
        ];

        // Call the store endpoint
        $response = $this->postJson('/api/signup', $validData);

        // Assert that the response has a 200 status
        $response->assertStatus(200);

        // Assert that the response contains the validated data
        $response->assertJson($validData);
    }
}
