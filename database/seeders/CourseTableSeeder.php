<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<5;$i++){
            Course::create([
                'name' => $faker->randomElement(['Python', 'HTML & CSS', 'Java', 'PHP & Larave', 'C++']),
                'creditPoints' => $faker->numberBetween(3,6),
                'yearCommenced' => $faker ->numberBetween(2020,2023),
                'program_id' => $faker->numberBetween(1,3)
            ]);
        }
    }
}
