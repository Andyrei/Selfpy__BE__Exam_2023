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
            'name'=>'abc_schema',
            'data' => '[
                {
                    "label":"adversity",
                    "info": "Adversity is the negative event that triggered your thoughts"
                },
                {
                    "label":"belief",
                    "info":"Beliefs are the thoughts that you had before/after the circumstance"
                },
                {
                    "label":"consequence",
                    "info": "Consequences are feelings and watnut that you had after the event"
                }
            ]',
        ]);
        DB::table('exercises')->insert([
            'name'=>'mood_track',
            'data'=>'[{"MoodName": ""},{"MoodScore":""},{"Notes":""}]'
        ]);
        DB::table('exercises')->insert([
            'name'=>'greatfulness',
            'data'=> '[{"title":"Greatefulness"}]'
        ]);
    }
}
