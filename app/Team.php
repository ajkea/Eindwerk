<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['FKuserID', 'teamName', 'teamDescription', 'FKmediaID'];

    public function users() {
        return $this->belongsToMany('App\User', 'user_teams', 'FKteamID', 'FKuserID');
    }

    public function players(){
        return $this->belongsToMany('App\Player', 'players_in_teams', 'FKteamID', 'FKplayerID');
    }

    public function media() {
        return $this->hasOne('App\Media', 'id','FKmediaID');
    }

    public function tactics() {
        return $this->hasMany('App\Tactic', 'FKteamID');
    }
}
