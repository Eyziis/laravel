<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Adresse;
use App\Models\Locataire;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logement>
 */
class LogementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            //
            'description' => fake()->paragraph(fake()->numberBetween(1,2)),
            'nb_chambre' => fake()->numberBetween(1,4)

        ];
    }
}
