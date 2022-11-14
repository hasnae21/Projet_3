<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tache;
use App\Models\Brief;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
 /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 9; $i++) {

            Brief::create([
                    'nomBrief' => Str::random(15),
                    'heurLivraison' => Carbon::now(),
                    'heurRecuperation' => Carbon::now()
            ]);

        }
    }
}
