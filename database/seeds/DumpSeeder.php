<?php

use Illuminate\Database\Seeder;

class DumpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([ 
            'email' => 'admin',
            'password' => Hash::make('password'),
        ]); 
    }
}
