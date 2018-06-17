<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayersInTeam extends Model
{
    protected $fillable = ['FKteamID', 'FKplayerID'];
}
