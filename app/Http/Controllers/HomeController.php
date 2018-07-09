<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = \App\User::where('active', 1)->count();
        $servicos = \App\Servico::where('active', 1)->count();
        $turnos = \App\Turno::where('active', 1)->count();
        $horarios = \App\Horario::where('dia',1)->count();
        
        
        return view('layouts.GH.dashboard', compact('users', 'servicos', 'turnos', 'horarios'));
    }
}
