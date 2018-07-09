@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Novo Turno</h1>
        </div>
        
        

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Turno
                </div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form role="form" method="POST" class="form-group input-group" action="{{ route('turnos.store') }}">    
                                    @csrf

                                <div class="form-group">
                                    <label>Nome :</label>
                                    <input class="form-control" type="text"  name="nome" id="nome" />
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