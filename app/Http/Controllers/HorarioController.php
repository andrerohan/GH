<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::select('data', 'servico_id', 'dia', 'mes', 'ano')
            ->where('dia',1)
            ->orderBy('mes','desc')
            ->get();
            
       return view('layouts.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicos = \App\Servico::where('active', 1)->get();
        return view('layouts.horarios.create',compact('servicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //valida dados

        $this->validate($request, [
            'servico_id' => 'required',
            'ano' => 'required',
            'mes' => 'required',

        ]);
     
        
        //verficiar dias do mes/ano introduzido
        $data_horario = \Carbon\Carbon::create($request->ano, $request->mes, 1);       
        $days = \Carbon\Carbon::parse($data_horario)->daysInMonth;


        //criar horario
        $horario = new Horario();

        
        for($i=1; $i <= $days; $i++){
            
            $horario->create([
                'servico_id'     => $request->servico_id,
                'data'     => \Carbon\Carbon::create($request->ano, $request->mes, $i, 0, 0, 0),
                'ano' => $request->ano,
                'mes' => $request->mes,
                'dia' => $i,
                
                ]);
        }
        
        
        session()->flash(
            'message', 'Horario de ' . $data_horario->month . ' de ' . $data_horario->year . ' criado com sucesso!'
        );

        return redirect('/horarios');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


        $horario = \App\Horario::where('servico_id' , $request->servico)
            ->whereMonth('data', $request->mes) 
            ->whereYear('data', $request->ano)
            //->select('id', 'data', 'servico_id')
            ->orderBy('dia')
            ->get();

        //return $horario;
            
        $users = \App\Servico::where('id', $request->servico)->first()->users()->orderby('user_id')->get();
        

        $data = \Carbon\Carbon::now();
        $data->year($request->ano)->month($request->mes);
        $days = $data->daysInMonth;

        
        $HUTs = \App\HorarioUserTurno::get()->groupBy('user_id');
    
        return view('layouts.horarios.show', compact('horario','days', 'users', 'HUTs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
