<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ateco extends Model
{
    protected $table="ateco";


    public function societa()
    {
        return $this->hasMany('App\societa');
    }
}
