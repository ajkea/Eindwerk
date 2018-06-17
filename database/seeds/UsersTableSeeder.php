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
                    'firstName' => 'Admin',
                    'lastName' => 'Admin',
                    'email'  => 'admin@admin.be',
                    'password' => bcrypt('secret'),
                    'role'  => 'admin',
                ],[
                    'firstName' => 'Guy',
                    'lastName' => 'Laekens',
                    'email'  => 'guyke18@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'firstName' => 'Fred',
                    'lastName' => 'Verbist',
                    'email'  => 'soccerkid@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
                    'firstName' => 'Els',
                    'lastName' => 'Janssens',
                    'email'  => 'els.janssens@gmail.com',
                    'password' => bcrypt('secret'),
                    'role'  => 'user',
                ],[
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
