<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brief;
use App\Models\Student;
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
        for ($i = 0; $i < 5; $i++) {
            Brief::create(
                [
                    'name' => Str::random(8),
                    'livraisonDate' => Carbon::now(),
                    'recuperationDate' => Carbon::now()
                ]
            );

            Student::create([
                'name' => Str::random(8)
            ]);
        }
    }
}
