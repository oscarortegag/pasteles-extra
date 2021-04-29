<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class descripcion extends Model
{
    protected $collection = "descripcion";
    public function descripcion(){
        return $this->hasMany('App\User','_id','iddescripcion');
        }
}
