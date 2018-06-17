<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['source', 'alt'];

    public function player() {
        return $this->belongsTo('App\Player', 'FKmediaID');
    }
}
