<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $fillable = ['xCoordinate', 'yCoordinate', 'Step', 'FKplayerInTacticID'];
}
