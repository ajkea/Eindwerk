<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['name', 'comment', 'FKmediaID'];

    public function players(){
        return $this->hasOne('App\Media');
    }
}