<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioUserTurno extends Model
{
    public function horario(){
        return $this->belongsTo('App\Horario');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function turno(){
        return $this->belongsTo('App\Turno');
    }
}
