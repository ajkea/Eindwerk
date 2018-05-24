<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTactic extends Model
{
    protected $fillable = ['tacticID', 'userID'];
}
