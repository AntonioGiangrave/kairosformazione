<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class corsi extends Model
{
    protected $table= 'corsi';

    public function proprietario()
    {
        return $this->belongsTo('App\societa' , 'owner_id', 'id');
    }

}
