<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['FKuserID', 'teamName', 'teamDescription', 'FKmediaID'];

    public function media() {
        return $this->hasOne('App\Media', 'id','FKmediaID');
    }
}
