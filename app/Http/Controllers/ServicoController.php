<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = \App\Servico::where('active', 1)->get();

        return view('layouts.servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = new \App\Servico();
        
        $this->validate($request, [
            'nome' => 'required|min:3|max:50',
        ]);


        $servico->create([
            'nome'     => $request['nome'],
            
            ]);

    
            session()->flash(
            'message', 'Serviço criado com sucesso!'
        );

        return redirect('/servicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        return view('layouts.servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico)
    {

        $this->validate($request, [
            'nome' => 'required|min:3|max:50',
        ]);


        $servico->update([
            'nome'     => $request['nome'],
            
            ]);

    
            session()->flash(
            'message', 'Serviço Atualizado com sucesso!'
        );

        return redirect('/servicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        $servico->active = 0;
        $servico->save();

        session()->flash(
            'message', 'Serviço apagado com sucesso'
        );

        return redirect('/servicos');
    }
}
