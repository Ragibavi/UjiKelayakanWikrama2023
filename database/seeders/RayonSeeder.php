<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rayon;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat 5 rayon menggunakan factory
Rayon::factory(5)->create();

    }
}

