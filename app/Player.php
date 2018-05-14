<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['firstName', 'lastName', 'birthDate', 'Description', 'FKpositionID', 'FKmediaID'];
}
