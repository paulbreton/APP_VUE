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

            ['name' => 'aaaa', 'username' => 'aaaa', 'email' => 'aaaa@aaaa.com', 'password' => Hash::make('password'), 'pseudo' => 'Aaaa'],
            ['name' => 'bbbb', 'username' => 'bbbb', 'email' => 'bbbb@bbbb.com', 'password' => Hash::make('password'), 'pseudo' => 'Bbbb'],
            ['name' => 'cccc', 'username' => 'cccc', 'email' => 'cccc@cccc.com', 'password' => Hash::make('password'), 'pseudo' => 'Cccc'],
            ['name' => 'dddd', 'username' => 'dddd', 'email' => 'dddd@dddd.com', 'password' => Hash::make('password'), 'pseudo' => 'Eeee'],
            ['name' => 'eeee', 'username' => 'eeee', 'email' => 'eeee@eeee.com', 'password' => Hash::make('password'), 'pseudo' => 'Dddd'],

            ['name' => 'ffff', 'username' => 'ffff', 'email' => 'ffff@ffff.com', 'password' => Hash::make('password'), 'pseudo' => 'Ffff'],
            ['name' => 'gggg', 'username' => 'gggg', 'email' => 'gggg@gggg.com', 'password' => Hash::make('password'), 'pseudo' => 'Gggg'],
            ['name' => 'hhhh', 'username' => 'hhhh', 'email' => 'hhhh@hhhh.com', 'password' => Hash::make('password'), 'pseudo' => 'Hhhh'],
            ['name' => 'iiii', 'username' => 'iiii', 'email' => 'iiii@iiii.com', 'password' => Hash::make('password'), 'pseudo' => 'Iiii'],
            ['name' => 'jjjj', 'username' => 'jjjj', 'email' => 'jjjj@jjjj.com', 'password' => Hash::make('password'), 'pseudo' => 'Jjjj'],

            ['name' => 'Sarah', 'username' => 'Fraîchit', 'email' => 'sara@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Sara'],
            ['name' => 'Chantal', 'username' => 'Gique', 'email' => 'gique@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Gique'],
            ['name' => 'Jim', 'username' => 'Agine', 'email' => 'agine@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Agine'],
            ['name' => 'Max', 'username' => 'Élaire', 'email' => 'elaire@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Eclaire'],
            ['name' => 'Benoit', 'username' => 'Cajou', 'email' => 'cajou@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Cajou'],

            ['name' => 'Jean', 'username' => 'Rage', 'email' => 'rage@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Rage'],
            ['name' => 'Pennie', 'username' => 'Ciline', 'email' => 'ciline@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Ciline'],
            ['name' => 'Rabbi', 'username' => 'Cyclette', 'email' => 'cyclette@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Cyclette'],
            ['name' => 'Tanguy', 'username' => 'Rlande', 'email' => 'rlande@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Rlande'],
            ['name' => 'Maude', 'username' => 'Erne', 'email' => 'erne@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Erne'],

            ['name' => 'Jordy', 'username' => 'Nateur', 'email' => 'nateur@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Nateur'],
            ['name' => 'Gilbert', 'username' => 'Lingot', 'email' => 'lingot@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Lingot'],
            ['name' => 'Paul', 'username' => 'Ussion', 'email' => 'ussion@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Ussion'],
            ['name' => 'Eddy', 'username' => 'Géstif', 'email' => 'gestif@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Gestif'],
            ['name' => 'Terry', 'username' => 'Golo', 'email' => 'golo@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Golo'],

            ['name' => 'Judas', 'username' => 'Bricot', 'email' => 'bricot@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Bricot'],
            ['name' => 'Roger', 'username' => 'Trobu', 'email' => 'trobu@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Trobu'],
            ['name' => 'Alphonse', 'username' => 'Danltas', 'email' => 'danltas@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Danltas'],
            ['name' => 'Sue', 'username' => 'Lfureux', 'email' => 'lfureux@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Lfrueux'],
            ['name' => 'Al', 'username' => 'Idantic', 'email' => 'idantic@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Identic'],

            ['name' => 'Anne', 'username' => 'Iversaire', 'email' => 'iversaire@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Iversaire'],
            ['name' => 'Fred', 'username' => 'Éfess', 'email' => 'efess@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Efess'],
            ['name' => 'Tarek', 'username' => 'Tiffieh', 'email' => 'tiffieh@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'tiffieh'],
            ['name' => 'Pat', 'username' => 'Ate', 'email' => 'ate@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'ate'],
            ['name' => 'Denis', 'username' => 'Veau', 'email' => 'veau@gmail.com', 'password' => Hash::make('password'), 'pseudo' => 'Veau'],

            ['name' => 'ADMIN', 'username' => 'ADMIN', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'pseudo' => 'ADMIN'],
        ]);
    }
}

