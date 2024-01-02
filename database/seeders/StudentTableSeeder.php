<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $programs = Program::all();
        $faker = Faker::create();
        for($i=0;$i<50;$i++){
            Student::create([
                'givenNames' => $faker->firstName(),
                'surName' => $faker->lastName(),
                'dob' => $faker->date(),
                'yearEnrolled' => $faker->numberBetween(2010,2023),
                'program_id' => $faker->numberBetween(1,3)
                // 'program_id' => $faker->randomElement($program)->id
            ]);
        }
    }
}
