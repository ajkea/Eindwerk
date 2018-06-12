<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    protected $fillable = ['played', 'goals', 'assists', 'yellow', 'red'];

    public function player() {
        return $this->belongsTo('App\Player');
    }
}
