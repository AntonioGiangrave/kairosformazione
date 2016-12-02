<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class registro_formazione extends Model
{
    protected $table="registro_formazione";


    public function _user(){
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function _corsi(){
        return $this->belongsTo('App\corsi' , 'corso_id');
    }

    public static function insertIgnore($array){
        $a = new static();
        if($a->timestamps){
            $now = \Carbon\Carbon::now();
            $array['created_at'] = $now;
            $array['updated_at'] = $now;
        }
        DB::insert('INSERT IGNORE INTO '.$a->table.' ('.implode(',',array_keys($array)).') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
    }

    public function sync_utente($id){
        $utente= User::find($id);
        $affectedRows = registro_formazione::whereNull('data_superamento')->where('user_id', '=', $id)->delete();
        foreach ($utente->_mansioni as $mansione) {
            foreach ($mansione->_corsi as $corso) {
                $registro_formazione =  new registro_formazione();
                $registro_formazione->user_id= $id;
                $registro_formazione->corso_id=$corso->id;
                $registro_formazione->insertIgnore($registro_formazione->toArray());
            }
        }
        if($utente->societa->ateco_id) {
            foreach ($utente->societa->ateco->_corsi as $corso) {

                $registro_formazione = new registro_formazione();
                $registro_formazione->user_id = $id;
                $registro_formazione->corso_id = $corso->id;
                $registro_formazione->insertIgnore($registro_formazione->toArray());
            }
        }
    }

    public function sync_azienda($id)
    {
        $societa = societa::with('user')->find($id);
        foreach ($societa->user as $utente) {
            $this->sync_utente($utente->id);
        }
    }

    public function sync_tutto(){
        $societa = societa::all();
        foreach ($societa as $singola){
            $this->sync_azienda($singola->id);
        }
    }

}
