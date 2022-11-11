<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Promotion;
use App\Models\Apprenant;
use App\Models\Tache;
use App\Models\Brief;
use App\Models\Briefs_apprenant;

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
        for ($i = 0; $i < 7; $i++) {

            Promotion::create([
                'name' => fake()->name(),
            ]);

            // Apprenant::create([
            //     'nom ' => fake()->name(),
            //     'prenom' => fake()->name(),
            //     'email' => fake()->unique()->safeEmail(),
            //     // 'promotion_id' => Str::random(15),
            // ]);

            Brief::create([
                    'nom_brief' => Str::random(15),
                    'date_debut' => Carbon::now(),
                    'date_fin' => Carbon::now()
            ]);

            // Tache::create([
            //     'nom_tache' => Str::random(15),
            //     'date_debut' => Carbon::now(),
            //     'date_fin' => Carbon::now(),
            //     'description' => Str::random(65),
            //     // 'brief_id' => Str::random(15),
            // ]);

            //Briefs_apprenant::create([
                // 'brief_id' => Str::random(15),
                // 'apprenant_id' => Str::random(15),
            //]);
        }
    }
}
