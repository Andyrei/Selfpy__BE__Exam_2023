<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'=>'an_dy',
            'surname'=>'Radoaca',
            'name' => 'Andrei',
            'email' => 'an@dy.com',
            'description' => 'I am decribing myself in here belive me',
            'password' => Hash::make('an@dy123'),
        ]);
    }
}
