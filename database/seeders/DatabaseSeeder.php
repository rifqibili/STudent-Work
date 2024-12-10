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
                'foto' => 'admin.jpeg',
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
                'foto' => 'admin.jpeg',
                'name'=> 'Pembuat',
                'email'=> 'buat@buat.com',
                'password'=> Hash::make('pembuatbuat'),
                'role'=> 'pembuat',
                'keahlian' => 'php,laravel',
                'linkedin' =>'',
                'status' => null
            ],
            [
                'id'=> 3,
                'foto' => 'admin.jpeg',
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
