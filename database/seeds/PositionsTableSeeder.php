<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('positions')->get()->count() == 0){
            DB::table('positions')->insert([
                [
                    'positionName' => 'ball',
                    'positionDescription' => 'ball'
                ],
                [
                    'positionName' => 'Doelman',
                    'positionDescription' => 'Een doelman is een speler die moet voorkomen dat de bal in het eigen doel terechtkomt. Een voetbalelftal heeft altijd één doelman in het veld staan.',
                ],
                [
                    'positionName' => 'Linksachter',
                    'positionDescription' => 'Deze speler is best links-voetig (indien mogelijk). Zij moeten voorkomen dat flankaanvallers of buitenspelers van de tegenpartij de kans krijgen om door te breken of een gevaarlijke voorzet te versturen. In balbezit mogen zij, vaak in tegenstelling tot centrale verdedigers, mee aanvallen en naar voor opschuiven.',
                ],
                [
                    'positionName' => 'Rechtsachter',
                    'positionDescription' => 'Deze speler is best rechts-voetig (indien mogelijk). Zij moeten voorkomen dat flankaanvallers of buitenspelers van de tegenpartij de kans krijgen om door te breken of een gevaarlijke voorzet te versturen. In balbezit mogen zij, vaak in tegenstelling tot centrale verdedigers, mee aanvallen en naar voor opschuiven.',
                ],
                [
                    'positionName' => 'Centrale verdediger',
                    'positionDescription' => 'Verdedigers hebben bij voetbal de taak te voorkomen dat de doelman onnodig in de problemen komt. Zij zijn namelijk de laatste linie tussen de aanvallers van de tegenstanders en de doelman.',
                ],
                [
                    'positionName' => 'Verdedigende middenvelder',
                    'positionDescription' => 'Een verdedigende middenvelder speelt meestal beheerst en minder aanvallend.',
                ],
                [
                    'positionName' => 'Centrale middenvelder',
                    'positionDescription' => 'Een centrale middenvelder heeft de kwaliteiten van zowel de verdedigende als de aanvallende middenvelders. Hij kan op beide posities spelen, maar komt veelal het best tot zijn recht als hij de vrijheid heeft om beide rollen te vervullen.',
                ],
                [
                    'positionName' => 'Aanvallende middenvelder',
                    'positionDescription' => 'Een aanvallende middenvelder scoort en laat scoren. Deze spelers hebben veelal een goede pass, goed schot, zijn snel en hebben een goed spelinzicht.',
                ],
                [
                    'positionName' => 'Linkse vleugelspeler',
                    'positionDescription' => 'Een linksvoetige aanvallende speler is de beste optie. Vleugelspelers in de voorhoede (vleugelspitsen) worden met name gebruikt in het 4-3-3 of 3-4-3 systeem.',
                ],
                [
                'positionName' => 'Rechtse vleugelspeler',
                'positionDescription' => 'Een rechtsvoetige aanvallende speler is de beste optie. Vleugelspelers in de voorhoede (vleugelspitsen) worden met name gebruikt in het 4-3-3 of 3-4-3 systeem.',
                ],
                [
                    'positionName' => 'Spits',
                    'positionDescription' => 'Dit is een aanvallende speler wiens belangrijkste taak het is om doelpunten te maken.',
                ],
            ]);
        }
    }
}
