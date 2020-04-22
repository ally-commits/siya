<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([ 
            'id' => uniqid(),
            'name' => 'Suppiiiiiiiiiiiii',
            'email' => 'admin',
            'password' => Hash::make('password'),
        ]); 
    }
}
