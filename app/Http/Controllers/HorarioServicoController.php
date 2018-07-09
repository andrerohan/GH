<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorarioServicoController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $users = \App\service::where('id', $horario->servico_id)->first()->users()->get();

        //return $users;
        // numero de dias (ex: 30) que o mês do schedule tem

        $days = \Carbon\Carbon::parse($horario->data)->daysInMonth;

        
        // linha de utilizadores que o schedule c/ este id tem.
        $turnosporutilizador = $horario->userturno()->where('horario_id', $Horario->id)->get();
        
        //return $usershifts;
        /* Turno Tarde
        
            $usershifts->first()->shift->name;

        */

        return view('layouts.horarios.show', compact('horario','days', 'users', 'turnosporutilizador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
