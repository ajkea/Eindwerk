<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('teams')->get()->count() == 0){
            DB::table('teams')->insert([
                [
                    'teamName' => 'DVV Borsbekia',
                    'teamDescription' => 'Zaalvoetbalploeg die actief is in Borsbeek. Interne competetie.',
                ],[
                    'teamName' => 'JeeDee',
                    'teamDescription' => 'Veldvoetbalploeg die actief is in Borsbeek op de sportvelden aan Hulgerode. Klaar voor promotie naar 4de klasse.',
                ],[
                    'teamName' => 'Cantincrode',
                    'teamDescription' => 'Veldvoetbalploeg die actief is in Boechout aan de rand met Borsbeek. Een ploeg met veel potentieel en veel ambitie.',
                ],[
                    'teamName' => 'Daltons',
                    'teamDescription' => 'Veldvoetbalploeg die blijven hangen in 4de klasse, behoud is voldoende stijgen is een pluspunt. Veel nieuwe spelers dus veel potentieel om te experimenteren.',
                ],[
                    'teamName' => 'FC de kampioenen',
                    'teamDescription' => 'Slechte ploeg die nood heeft aan nieuwe spelers, op deze manier gaan ze het niet lang trekken.',
                ],
            ]);
        }
    }
}
