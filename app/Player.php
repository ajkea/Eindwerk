<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'birthDate', 'description', 'FKpositionID', 'FKmediaID', 'shirtNumber'
    ];

    public function media() {
        return $this->hasOne('App\Media', 'id','FKmediaID');
    }

    public function position() {
        return $this->hasOne('App\Position', 'id', 'FKpositionID');
    }

    public function playerskill() {
        return $this->hasOne('App\PlayerSkill', 'FKplayerID');
    }

    public function teams() {
        return $this->belongsToMany('App\Team', 'players_in_teams', 'FKteamID', 'FKplayerID');
    }

    public function coordinates() {
        return $this->hasManyThrough(
            'App\Coordinate', 
            'App\PlayersInTactic',
            'FKplayerID',
            'FKplayersInTacticID',
            'id',
            'id');
    }
    
}
