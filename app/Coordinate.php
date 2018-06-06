<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $fillable = ['xCoordinate', 'yCoordinate', 'step', 'FKplayersInTacticID'];

    public function playersInTactic() {
        $this->belongsTo('App\PlayersInTactic');
    }
}
