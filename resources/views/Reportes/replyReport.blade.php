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
  <div class='file-input'>
    <input type='file' name="archivo" class="form-control">
    <span class='button'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
      <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
      <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
    </svg></span>
    <span class='label' data-js-label>No file selected</label>
  </div>
</div>

</div>

<div class="col-12">
    <input type="hidden" name="tickid" value="{{$ticket->id}}">
    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
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

/* estilos para el file*/

.file-input {
  text-align: left;
  background: #fff;
  padding: 10px;
  width: 100%px;
  position: relative;
  border-radius: 3px ;
  border: 0.4px solid rgba(0, 0, 0, 0.205);
  margin-top: 20px;
}

.file-input > [type='file'] {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 10;
  cursor: pointer;

}

.file-input > .button {
  display: inline-block;
  cursor: pointer;
  background: #eee;
  padding: 8px 16px;
  border-radius: 2px;
  margin-right: 8px;

}

.file-input:hover > .button {
  background: dodgerblue;
  color: white;
}

.file-input > .label {
  color: #333;
  white-space: nowrap;
  opacity: .3;

}

.file-input.-chosen > .label {
  opacity: 1;
}

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

//para que se muestre el texto en el file
var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')

  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return

    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}

</script>

@stop
