@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><a href="{{ url("servicos/create") }}" class="btn btn-outline btn-success btn-sm">Novo Serviço</a></h1>
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
                    Serviços
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Criado a...</th>
                                    <th>Atualizado a...</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos as $servico)
                                <tr>
                                    <td>{{$servico->nome}}</td>
                                    <td>{{$servico->created_at}}</td>
                                    <td>{{$servico->updated_at}}</td>
                                   
                                    <td>
                                            <form action="/servicos/{{$servico->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
    
                                                <a href="{{ url("servicos/$servico->id/edit") }}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
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