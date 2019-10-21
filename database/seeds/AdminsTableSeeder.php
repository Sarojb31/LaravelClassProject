<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('admins')->insert([
            'name' => 'test',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
            DB::table('admins')->insert([
            'name' => 'test',
            'email' =>'admin1@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
