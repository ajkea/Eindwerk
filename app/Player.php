<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'birthDate', 'description', 'FKpositionID', 'FKmediaID'
    ];

    public function media() {
        return $this->hasOne('App\Media', 'id','FKmediaID');
    }

    public function position() {
        return $this->hasOne('App\Position', 'id','FKpositionID');
    }
}
