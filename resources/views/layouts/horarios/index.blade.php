@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><a href="{{ url("horarios/create") }}" class="btn btn-outline btn-success btn-sm">Novo Horário</a></h1>
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{!! session('message') !!}</strong>
            </div>
        @endif
        </div>

        
        
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Horários
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ano</th>
                                    <th>Mês</th>
                                    <th>Serviço</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)                                     
                                            <tr>
                                                <td>{{$horario->ano}}</td>
                                                <td>{{$horario->mes}}</td>
                                                <td><a href="/horarios/servico/horario?ano={{$horario->ano}}&mes={{$horario->mes}}&servico={{$horario->servico->id}}">{{$horario->servico->nome}}</a></td>
                                                                                         
                                                <td>                                                       
                                                    <form action="#" method="POST">
                                                        @method('DELETE')
                                                        @csrf
    
                                                        <a href="#" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                                    </form> 
                                                </td>  
                                            </tr>             
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

@endsection