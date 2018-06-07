<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayersInTactic extends Model
{
    protected $fillable = ['FKtacticID', 'FKplayerID'];

    public function coordinates() {
        return $this->hasMany('App\Coordinate', 'FKplayersInTacticID');
    }
}
