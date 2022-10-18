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

<div class="row">
    <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-6">
    <b>Usuario:</b>
      </div>
      <div class="col-sm-6">
@foreach ($users as $user)
@if($ticket->usuario==$user->id)


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
<form action="{{route('ticket_reply')}}" method="post">
    @csrf

<br>
<div class="col-12">
<textarea name="descripcion" id="descripcion" rows="1" class="form-control"></textarea>
</div>

<div class="col-12">

</div>

</div>

<div class="col-12">
    <input type="hidden" name="tickid" value="{{$ticket->id}}">
    <button type="submit" class="btn btn-success float-right" style="margin: 0 0 10px 10px">Responder</button>
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

textarea {
  background-color:rgba(white,0.2);
  border:solid 1px transparent;
  color:darken(invert($black),10%);
  overflow:hidden;
  width:600px;
  font-size:2em;
  &:focus {
    background-color:rgba(white,0.3);
    border-color:darken(lightblue,40%);
  }
}

/* estilos para el agregar*/

</style>
@stop

@section('js')
<script>

    //para el textarea sea responsiva
    $('textarea').on('change keydown paste', function(e){
    var text = $(this).val();
    var lineBreaksCount = text.replace(/[^\n]/g, "").length;
    if( e.keyCode == 13 ) {
      lineBreaksCount++;
    }
    $(this).attr('rows', lineBreaksCount+1);
});


</script>

@stop
