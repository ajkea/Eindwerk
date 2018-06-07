<?php

use Illuminate\Database\Seeder;

class UserTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('user_teams')->get()->count() == 0){
            DB::table('user_teams')->insert([
                [
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],[
                    'FKuserID' => rand(1,5),
                    'FKteamID' => rand(1, 5),
                ],
            ]);
        }
    }
}
