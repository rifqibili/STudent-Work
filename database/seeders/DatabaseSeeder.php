<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'=> 1,
                'foto' => 'donuts.png',
                'name'=>'Admin',
                'email'=>'hasAdmin@admin.com',
                'password' =>Hash::make('adminhebat'),
                'role' => 'admin',
                'keahlian' => null,
                'linkedin' =>null,
                'status' => null
            ],
            [
                'id'=> 2,
                'foto' => 'photoprofil.png',
                'name'=> 'Pembuat',
                'email'=> 'buat@buat.com',
                'password'=> Hash::make('pembuatbuat'),
                'role'=> 'pembuat',
                'keahlian' => 'php,laravel',
                'linkedin' =>'https://www.linkedin.com/in/rofiif-nabil-syafaqoh-970953270/',
                'status' => null
            ],
            [
                'id'=> 3,
                'foto' => 'R.jpg',
                'name'=> 'penyedia',
                'email'=> 'penyedia@penyedia.com',
                'password'=> Hash::make('penyediadia'),
                'role'=> 'penyedia',
                'keahlian' => null,
                'linkedin' =>null,
                'status' => null
            ]
            ]);
    }
}
