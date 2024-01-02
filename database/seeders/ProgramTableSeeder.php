<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Program;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<3;$i++){
            Program::create([
                'name' => $faker->unique()->randomElement(['DH','NK','CD']),
                'creditPoint' => $faker->numberBetween(20,40),
                'yearCommenced' => $faker->numberBetween(2010,2023)
            ]);
        }
    }
}
