@extends('layouts.GH.master')

@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{$horario->first()->mes}} / {{$horario->first()->ano}}</h1>
    </div>
        
    <div class="row">
      <div class="col-lg-12">
        <h2>{{$horario->first()->servico->nome}} </h2>
        <div class="table-responsive-lg">
            <table class="table table-hover table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Utilizadores</th>
                @for($i = 1; $i <= $days; $i++)
                  <th>{{$i}}</th>
                @endfor
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                @foreach($horario as $h)
                    <td>  
                      @foreach($HUTs->get($user->id) as $hut)
                        @if($hut->horario->id == $h->id)
                          <a href="/HUTs/HUT?H={{$h->id}}&U={{$hut->user_id}}">{{$hut->turno->nome}}</a>
                        @endif
                      @endforeach
                    </td>
                @endforeach
              </tr>
            @endforeach         
          </tbody>
        </table>
  </div>
      </div>
    </div>
  </div>
</div>

@endsection


