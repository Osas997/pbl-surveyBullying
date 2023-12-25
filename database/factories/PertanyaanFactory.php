<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PertanyaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pertanyaan' => $this->faker->sentence(),
            'tipe_pertanyaan' => 'korban',
            'tipe_perilaku' => 'verbal',
        ];
    }
}
