<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use APp\models\Logement;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
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
            'rue' => fake()->streetName(),
            'numero' => fake()->numberBetween(1,200),
            'codePostal' => substr(fake()->postcode(),0,4),
            'ville' => fake()->city(),
            'pays' => 'Belgique',
            'logement_id' =>fake()->unique()->numberBetween(1,50),
        ];
    }
}
