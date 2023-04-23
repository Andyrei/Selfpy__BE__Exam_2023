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
            'data' => '{"adversity": {"info": "Adversity is the negative event that triggered your thoughts","content": ""},"belief": {"info":"Beliefs are the thoughts that you had before/after the circumstance","content": ""}"consequence":{"info": "Consequences are feelings and watnut that you had after the event","content": ""}}'
        ]);
    }
}
