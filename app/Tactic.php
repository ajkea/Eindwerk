<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tactic extends Model
{
    protected $fillable = ['tacticName', 'tacticDescription', 'tacticType', 'FKteamID'];

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function players(){
        return $this->belongsToMany('App\Player', 'players_in_tactics', 'FKtacticID', 'FKplayerID');
    }

    public function playersInTactic() {
        return $this->hasMany('App\PlayersInTactic', 'FKtacticID');
    }
}
