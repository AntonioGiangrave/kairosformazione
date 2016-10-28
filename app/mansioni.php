<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mansioni extends Model
{
    protected $table= 'mansioni';


    public function _settore()
    {
        return $this->belongsTo('App\settori' , 'settore_id');
    }

}
