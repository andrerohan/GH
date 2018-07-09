@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Novo Horario</h1>
        </div>
        
        

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Horario
                </div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form role="form" method="POST" class="form-group input-group" action="{{ route('horarios.store') }}">    
                                    @csrf

                                <div class="form-group">
                                    <label>Ano :</label>
                                    <input class="form-control" type="number"  name="ano" id="ano" />
                                </div>

                                <div class="form-group">
                                    <label>Mês :</label>
                                    <input class="form-control" type="number"  name="mes" id="mes" />
                                </div>

                                <div class="form-group">
                                        <label>Serviço :</label>
                                        <select class="form-control" name="servico_id" id="servico_id" >
                                            <option value="">Selecionar Serviço</option>
                                            @foreach($servicos as $servico)
                                                <option value="{{$servico->id}}">{{$servico->nome}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>

                                <div class="form-group">
                                    <a href="{{ URL::previous() }}"class="btn btn-default">Voltar</a>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            
                                @if (count($errors))
                                    @include('layouts.errors.errors')
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection