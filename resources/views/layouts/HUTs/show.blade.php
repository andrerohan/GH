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
                        
                    <form method="POST" class="form-group input-group">  
                                @method('PATCH')  
                                @csrf

                            <div class="form-group">
                                <label>Utilizador:</label>
                                <select class="custom-select" name="user_id" id="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ $user->id === $request_user ? 'selected' : '' }} > {{$user->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @foreach($turnos as $turno )
                                    @if(empty($HUTs->where('turno_id', $turno->id)->first()->turno_id))
                                    
                                    <div class="form-check">   
                                    <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="turno_id{{$turno->id}}" id="turno_id{{$turno->id}}" value="{{$turno->id}}">
                                            {{$turno->nome}}
                                        </label
                                    </div>
                    
                                    @else
                                        @if($turno->id === $HUTs->where('turno_id', $turno->id)->first()->turno_id)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" checked name="turno_id{{$turno->id}}" id="turno_id{{$turno->id}}" value="{{$turno->id}}">
                                                {{$turno->nome}}
                                            </label
                                        </div>
                                        @endif

                                    @endif
                                @endforeach   
                          
                        
                            <input type="hidden" value="{{$turnos->count()}}" name="turnos_count" id="turnos_count" />

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
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

@endsection