<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'nome',
    ];    
    
    public function users(){
        return $this->belongsToMany('App\User', 'user_servico', 'servico_id','user_id');
    }

    public function horarios(){
        return $this->belongsTo('App\Horario');
    }
}


