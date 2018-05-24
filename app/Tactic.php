<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tactic extends Model
{
    protected $fillable = ['tacticName', 'tacticDescription', 'tacticType', 'FKformationID'];
}
