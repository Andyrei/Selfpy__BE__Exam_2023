<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->insert([
            'name' => 'abc_schema',
            'data' =>'[{"title": "Abc Schema","its_data":[{"label":"adversity","info": "Adversity is the negative event that triggered your thoughts"},{"label":"belief","info": "Beliefs are the thoughts that you had before/after the circumstance"},{"label":"consequence","info": "Consequences are feelings and watnut that you had after the event"}]}]'
        ]);
        DB::table('exercises')->insert([
            'name' => 'mood_track',
            'data' =>'[{"title":"mood track"},{"its_data":{}}]'
        ]);
        DB::table('exercises')->insert([
            'name' => 'gratefulness',
            'data' =>'[{"title":"gratefulness"},{"its_data":{}}]'
        ]);
    }
}
