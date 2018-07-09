<?php

namespace App\Http\Controllers;

use App\HorarioUserTurno;
use Illuminate\Http\Request;

class HorarioUserTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HorarioUserTurno  $horarioUserTurno
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $HUTs = \App\HorarioUserTurno::where(['horario_id' => $request->H, 'user_id' => $request->U])
        ->get();

        $turnos = \App\Turno::get();
        //servico = $HUT->first()->horario->servico->nome;
        //data = $HUT->first()->horario->data;
        $users = \App\Servico::where('id', $HUTs->first()->horario->servico->id)->first()->users()->orderby('user_id')->get();

        $request_user = (int)$request->U;

        //return  $HUTs->where('turno_id', 50)->first()->default('');
        
        
        return view('layouts.HUTs.show', compact('users','HUTs', 'request_user', 'turnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HorarioUserTurno  $horarioUserTurno
     * @return \Illuminate\Http\Response
     */
    public function edit(HorarioUserTurno $horarioUserTurno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HorarioUserTurno  $horarioUserTurno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        $HUTs = \App\HorarioUserTurno::where(['horario_id' => $request->H, 'user_id' => $request->U])->get();





        foreach($HUTs as $hut){
            $hut->delete();
        }

        for ($i=1; $i <= $request->turnos_count; $i++){
            $HUT = new \App\HorarioUserTurno();
            $HUT->horario_id = $request->H;
            $HUT->user_id = $request->user_id;
            $HUT->turno_id = $request->turno_id . $i;
            $HUT->save;
        }
        
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HorarioUserTurno  $horarioUserTurno
     * @return \Illuminate\Http\Response
     */
    public function destroy(HorarioUserTurno $horarioUserTurno)
    {
        //
    }
}
