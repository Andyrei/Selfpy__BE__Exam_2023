<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_exercises')->insert([
            'user_id'=>'1',
            'exercise_id' => '1',
            'data' => '{"adversity":"Some event inserted here","belief":"Some belief here","feellings":"UH.... Feelings"}',
        ]);
    }
}
