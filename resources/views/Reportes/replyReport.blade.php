@extends('adminlte::page')
@section('title', 'Contestar')

@section('content_header')

@section('content')
<br>
<div class="card">
    <div class="card-body">
<div>
    <div style="display: flex;"><img src="{{asset('img/2tickets.png')}}" alt="tickets" height="50px" width="55px"><h5>{{$ticket->codigo}}</h5></div>
</div>

<form action="" method="POST">
@csrf

<div class="row">
    <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-6">
    <b>Usuario:</b>
      </div>
      <div class="col-sm-6">
@foreach ($users as $user)
@if($ticket->usuario==$user->id)
<input type="hidden" name="tickid" value="{{$ticket->id}}">

    <span id="user">{{$user->name}}</span>
@endif
@endforeach
      </div>
    </div>
    </div>

    <div class="col-sm-6">
    <div class="row">
    <div class="col-sm-6">
    <b>Categorias:</b>
    </div>
    <div class="col-sm-6">
    <span id="cat">{{$ticket->opcion1}}>{{$ticket->opcion2}} @if($ticket->opcion3!="")>{{$ticket->opcion3}}@endif @if($ticket->opcion4!="")>{{$ticket->opcion4}}@endif</span>
    </div>
    </div>
    </div>

     </div>
<hr>

<div class="row">

<div class="col-sm-6">
<div class="row">
<div class="col-sm-6">
<b>Status:</b>
</div>
<div class="col-sm-6">
<span id="stat">{{$ticket->status}}</span>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="row">
<div class="col-sm-6">
<b>Prioridad:</b>
</div>
<div class="col-sm-6">
<span id="prio">{{$ticket->prioridad}}</span>
</div>
</div>
</div>

</div>
<hr>
<div class="row">

<div class="col-sm-6">
<div class="row">
  <div class="col-sm-6">
<b>Tema:</b>
  </div>
  <div class="col-sm-6">
<span id="temaa">{{$ticket->tema}}</span>
  </div>
</div>
</div>

<div class="col-sm-6">
<div class="row">
<div class="col-sm-6">
<b>Fecha de Creacion:</b>
</div>
<div class="col-sm-6">
<span id="fech">{{$ticket->created_at}}</span>
</div>
</div>
</div>

 </div>
<hr>

<div class="row">

<div class="col-sm-12">
<div class="row">
<div class="col-sm-3">
<b>Descripcion:</b>
</div>
<div class="col-sm-9">
<span id="desc">{{$ticket->descripcion}}</span>
</div>
</div>
</div>

</div>
<hr>

<div class="row">

    <div class="col-sm-12">
    <div class="row">
    <div class="col-sm-3">
    <b>Archivos:</b>
    </div>
@if ($ticket->archivo!="")
    <div class="col-sm-9">
    <a href="{{Route('descargarA',$ticket->id)}}" class="btn" style="background: rgb(42, 149, 192); color:white">Descargar</a>
    </div>
@else
<div class="col-sm-9">
<span>El usuario no Agrego ningun Archivo</span>
</div>
@endif

    </div>
    </div>
    </div>
<hr>

<div id="respuestas"></div>

<br>
<div class="col-12">
<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
</div>

<div class="col-12">
    <button type="submit" class="btn btn-success float-right">Responder</button>
</div>

</form>

    </div>
</div>

@stop

@section('css')
<style>
    h5{
    margin-left: 7px;
    line-height: 2.5;

}
</style>
@stop

@section('js')


@stop
