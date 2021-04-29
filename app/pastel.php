<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class pastel extends Model
{
    protected $collection = "pastel";

    public function pastel(){
        return $this->hasMany('App\User','_id','idpastel');
        }
}
