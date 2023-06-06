<?php

namespace Database\Seeders;

use App\Models\Logement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Logement::factory()->count(50)->create();
    }
}
