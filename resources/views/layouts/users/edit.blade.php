@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Perfil</a></h1>
        </div>
        
        

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Utilizador
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                        
                                <form method="POST" class="form-group input-group" action="/users/{{$user->id}}">  
                                    @method('PATCH')  
                                    @csrf

                                <div class="form-group">
                                    <label>Nome :</label>
                                    <input class="form-control" type="text"  name="name" id="name" value="{{$user->name}}"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email :</label>
                                    <input class="form-control" type="email"  id="email" name="email" value="{{$user->email}}"/>
                                </div>

                                <div class="form-group">
                                    <a href="{{ URL::previous() }}"class="btn btn">Voltar</a>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            
                                @if (count($errors))
                                    @include('errors.errors')
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Alterar Password
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
    
                                    <form method="POST" class="form-group input-group" action="/users/{{$user->id}}">  
                                        @method('PATCH')  
                                        @csrf
    
                                        <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input class="form-control" type="password"  id="password" name="password"  />
                                            </div>
            
                                            <div class="form-group">
                                                <label >Confirmação de Password</label>
                                                <input class="form-control" type="password"   id="password_confirmation" name="password_confirmation"  />
                                            </div>
            
                                            <div class="form-group">
                                                <a href="{{ URL::previous() }}"class="btn btn-default">Voltar</a>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                
                                    @if (count($errors))
                                        @include('errors.errors')
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection