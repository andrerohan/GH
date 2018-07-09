<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'servico_id', 'data', 'dia', 'mes', 'ano',
    ]; 
    
    public function users(){
        return $this->hasMany('App\User');
    }

    public function servico(){
        return $this->belongsTo('App\Servico');
    }

    public function HUT(){
        return $this->hasMany('App\HorarioUserTurno');
    }
}
