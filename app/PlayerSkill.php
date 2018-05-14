<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerSkill extends Model
{
    protected $fillable = ['shooting', 'defending', 'speed', 'stamina', 'dribbling', 'preferredFoot', 'height', 'weight', 'FKplayerID']
}
