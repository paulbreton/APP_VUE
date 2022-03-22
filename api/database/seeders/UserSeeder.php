<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            ['name' => 'lele', 'username' => 'lele', 'email' => 'lele@lele.com', 'password' => Hash::make('password'), 'pseudo' => 'Lele'],
            ['name' => 'caca', 'username' => 'caca', 'email' => 'caca@caca.com', 'password' => Hash::make('password'), 'pseudo' => 'Caca'],
            ['name' => 'gaga', 'username' => 'gaga', 'email' => 'gaga@gaga.com', 'password' => Hash::make('password'), 'pseudo' => 'Gaga'],
            ['name' => 'fefe', 'username' => 'fefe', 'email' => 'fefe@fefe.com', 'password' => Hash::make('password'), 'pseudo' => 'Fefe'],
            ['name' => 'vava', 'username' => 'vava', 'email' => 'vava@vava.com', 'password' => Hash::make('password'), 'pseudo' => 'Vava'],
            ['name' => 'ADMIN', 'username' => 'ADMIN', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'pseudo' => 'ADMIN'],
        ]);
    }
}

