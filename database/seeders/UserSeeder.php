<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'role' => 'Admin',
            ]
        );
        DB::table('users')->insert([
            'foto' => 'user.png',
            'nama' => 'Moch Arif Rochmanullah',
            'username' => 'Rachmanullah45',
            'email' => 'rachmanullah1@gmail.com',
            'password' => Hash::make('HarimauPutih45'),
            'alamat' => 'Perum City View 1',
            'role_id' => 1,
        ]);
    }
}
