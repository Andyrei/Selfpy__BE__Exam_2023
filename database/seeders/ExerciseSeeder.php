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
        ]);
        DB::table('exercises')->insert([
            'name'=>'mood_track',
        ]);
        DB::table('exercises')->insert([
            'name'=>'greatfulness',
        ]);
    }
}
