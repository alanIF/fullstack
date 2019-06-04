<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('123456'),
            'tipo'=> 'A'
        ]);
    }
}
