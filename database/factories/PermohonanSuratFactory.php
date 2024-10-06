<?php

namespace Database\Factories;

use App\Models\permohonan_surat;
use App\Models\PermohonanSurat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PermohonanSurat>
 */
class PermohonanSuratFactory extends Factory
{
    /**
     * Define the model's default state.
     
     * @return array<string, mixed>
     */

     protected $model = PermohonanSurat::class;
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'email' => $this->faker->safeEmail,
            'jenis_surat' => $this->faker->word,
        ];
    }
}
