<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin abdo',
            'tele' => '06682906526',
            'age' => 22,
            'ville' => ' Fes',
            'isAdmin' => true,
            'path' => 'admin.png',
            'email' => 'abdo.alkhyatte5@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'remember_token' => token_name(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'amine',
            'tele' => '06682906526',
            'age' => 22,
            'ville' => ' Fes',
            'isAdmin' => false,
            'path' => 'admin.png',
            'email' => 'amine@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'remember_token' => token_name(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
