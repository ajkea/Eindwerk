<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            [
            'firstName' => 'bal',
            'lastName' => 'bal',
            'birthDate' => date("Y-m-d"),
            'description' => 'bal',
            'FKpositionID' => '1',
            'shirtNumber' => '100',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'firstName' => 'tegenstander',
            'lastName' => 'tegenstander',
            'birthDate' => date("Y-m-d"),
            'description' => 'tegenstander',
            'FKpositionID' => '2',
            'shirtNumber' => '101',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            // [
            // 'firstName' => 'Liam',
            // 'lastName' => 'Wyckmans',
            // 'birthDate' => date("Y-m-d", strtotime("2002-01-07")),
            // 'description' => 'Zeer snelle en behindige speler, kopballen en korte passing kan beter.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Arthur',
            // 'lastName' => 'Leenaerts',
            // 'birthDate' => date("Y-m-d", strtotime("1999-04-01")),
            // 'description' => 'Sterke en grote speler, perfect in de hoogte.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Lars',
            // 'lastName' => 'Verstringe',
            // 'birthDate' => date("Y-m-d", strtotime("2001-06-27")),
            // 'description' => 'Precieze passer en heeft een krachtig schot in huis, korte passes kunnen beter.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Noah',
            // 'lastName' => 'Braem',
            // 'birthDate' => date("Y-m-d", strtotime("2002-11-11")),
            // 'description' => 'Zeer grote keeper, erg behendig en gaat snel plat.',
            // 'FKpositionID' => 1,
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Jonas',
            // 'lastName' => 'Stynen',
            // 'birthDate' => date("Y-m-d", strtotime("2000-05-08")),
            // 'description' => 'Uitstekende conditie en loopt heel het veld af.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Jens',
            // 'lastName' => 'Bastiaens',
            // 'birthDate' => date("Y-m-d", strtotime("2001-02-21")),
            // 'description' => 'Kan goed spelen op de buitenspelval, niet supersnel wel precies.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Zeno',
            // 'lastName' => 'Van Regenmortel',
            // 'birthDate' => date("Y-m-d", strtotime("2000-01-11")),
            // 'description' => 'Blok op het veld, perfect in het onderscheppen van passes. Wel snel vermoeid door intensief spel.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ],[
            // 'firstName' => 'Arne',
            // 'lastName' => 'Lambrechts',
            // 'birthDate' => date("Y-m-d", strtotime("2005-12-24")),
            // 'description' => 'Jong talent, heeft nood aan speelkansen zodat hij verder kan evolueren.',
            // 'FKpositionID' => rand(1, 10),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            // ]
        ]);
    }
}
