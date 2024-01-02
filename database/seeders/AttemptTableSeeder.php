<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Attempt;

class AttemptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            Attempt::create([
                'student_id' => $faker->numberBetween(50,100),
                'course_id' => $faker->numberBetween(6,10),
                'semester' =>$faker->numberBetween(1,8),
                'year' => $faker->numberBetween(2020,2023),
                'grade' => $faker->randomFloat(2,1,4)
            ]);
        }
    }
}
