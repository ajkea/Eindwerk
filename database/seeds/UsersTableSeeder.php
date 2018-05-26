<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0){
            DB::table('users')->insert([
                [
                    'username' => 'admin',
                    'firstName' => 'Admin',
                    'lastName' => 'Admin',
                    'email'  => 'admin@admin.be',
                    'password' => bcrypt('secret'),
                    'role'  => 'admin',
                ],[
                    'username' => str_random(8),
                    'firstName' => 'Guy',
                    'lastName' => 'Laekens',
                    'email'  => str_random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => str_random(8),
                    'firstName' => 'Fred',
                    'lastName' => 'Verbist',
                    'email'  => str_random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => str_random(8),
                    'firstName' => 'Els',
                    'lastName' => 'Janssens',
                    'email'  => str_random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => str_random(8),
                    'firstName' => 'Emmanuel',
                    'lastName' => 'Dierckx',
                    'email'  => str_random(10).'@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ]
            ]);
        }
    }
}
