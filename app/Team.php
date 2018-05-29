<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['FKuserID', 'teamName', 'teamDescription', 'FKmediaID'];

    public function users(){
        return $this->belongsToMany('App\User', 'user_teams', 'FkteamID', 'FKuserID');
    }

    public function playersInTeam(){
        return $this->belongsToMany('App\PlayersInTeam', 'players_in_team', 'FkteamID', 'FKplayerID');
    }

    public function media() {
        return $this->hasOne('App\Media', 'id','FKmediaID');
    }
}
