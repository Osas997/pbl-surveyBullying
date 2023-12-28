<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sekolah;
use App\Models\Pertanyaan;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiPertanyaanTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // use RefreshDatabase;

    public function test_index_returns_data()
    {
        Sanctum::actingAs(Sekolah::factory()->create());
        // Seed the database with some Pertanyaan records
        // Pertanyaan::factory()->count(3)->create();

        // Call the index endpoint
        $response = $this->getJson('/api/pertanyaan');

        // Assert that the response has a data key
        $response->assertJsonStructure(['data']);

        // Assert that the response status is 200 (OK)
        $response->assertOk();
    }
}
