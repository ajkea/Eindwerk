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
                    'username' => 'guyke18',
                    'firstName' => 'Guy',
                    'lastName' => 'Laekens',
                    'email'  => 'guyke18@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => 'soccerkid',
                    'firstName' => 'Fred',
                    'lastName' => 'Verbist',
                    'email'  => 'soccerkid@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => 'mourinho12',
                    'firstName' => 'Els',
                    'lastName' => 'Janssens',
                    'email'  => 'els.janssens@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'username' => 'wilmots',
                    'firstName' => 'Emmanuel',
                    'lastName' => 'Dierckx',
                    'email'  => 'edierckx@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ]
            ]);
        }
    }
}
