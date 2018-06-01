<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $fillable = ['xCoordinate', 'yCoordinate', 'Step', 'FKplayerInTacticID'];

    public function showAllCoordinates(){
        return $coordinates = DB::table('coordinates')
            ->join('players_in_tactics', 'FKplayersInTactic', 'players_in_tactics.playersInTacticID')
            ->join('players', 'players_in_tactics.playersInTacticID', 'players.playerID')
            ->select('coordinates.*', 'players.firstName', 'players.lastName')
            ->get();
    }

    public function showCoordinate($coordinateID){
        return $coordinate = DB::table('coordinates')
                ->join('players_in_tactics', 'FKplayersInTactic', 'players_in_tactics.playersInTacticID')
                ->join('players', 'players_in_tactics.playersInTacticID', 'players.playerID')
                ->select('coordinates.*', 'players.firstName', 'players.lastName')
                ->where('coordinates.FKplayersInTactics', '=', $coordinateID)
                ->first();
    }

    public function playersInTactic() {
        $this->belongsTo('App\PlayersInTactic');
    }
}
