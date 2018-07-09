<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = \App\Turno::where('active', 1)->get();

        return view('layouts.turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new \App\Turno();
        
        $this->validate($request, [
            'nome' => 'required|min:1|max:50',
        ]);


        $turno->create([
            'nome'     => $request['nome'],
            
            ]);

    
            session()->flash(
            'message', 'Turno criado com sucesso!'
        );

        return redirect('/turnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        return view('layouts.turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $this->validate($request, [
            'nome' => 'required|min:1|max:50',
        ]);


        $turno->update([
            'nome'     => $request['nome'],
            
            ]);

    
            session()->flash(
            'message', 'Turno Atualizado com sucesso!'
        );

        return redirect('/turnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        $turno->active = 0;
        $turno->save();

        session()->flash(
            'message', 'Turno apagado com sucesso'
        );

        return redirect('/turnos');
    }
}
