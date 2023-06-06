<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Logement;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locataire>
 */
class LocataireFactory extends Factory
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
            'logement_id' => Logement::Factory(),//$this->getUniqueId(1, 50),
            'nom' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'age' => fake()->numberBetween(20, 80),
            'date_e' => fake()->date(),
            'date_s' => null,
            'reference_prec' => fake()->randomNumber(6)
        ];
    }

    private function getUniqueId(int $int1, int $int2)
    {
        $id = DB::select('SELECT logement_id from Locataires');
        $retry = 1;
        do {
            $uniqueId = rand($int1, $int2);
            if (!in_array($uniqueId, $id)) {
                $retry = 10000;
            } else {
                $uniqueId = null;
            }
            $retry += 1;
        } while ($retry < 1000);

        return $uniqueId;
    }
}
