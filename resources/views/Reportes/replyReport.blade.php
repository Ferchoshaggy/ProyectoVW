@extends('adminlte::page')
@section('title', 'Contestar')

@section('content_header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">


@section('content')

<br>
<div class="card">
    <div class="card-body">

 @if (Session::has('message'))
<br>

@if(Session::get('message')== "Se Mando la Contestacion con Exito")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@endif


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
@foreach ($replys as $reply)
<div style="padding: 8px 25px 8px 25px">
<div class="row">
<div class="col-2">
    @foreach ($users as $user)
    @if ($user->id==$reply->id_user)
    @if ($user->foto==null)
   <center><img src="{{asset('ImgUser/usuario.png')}}" height="40px" width="40px"></center>
     @else
    <center><img src="{{url('ImgUser')}}/{{$user->foto}}" height="40px" width="40px"></center>
    @endif
    @endif
    @endforeach
</div>

<div class="col-9" style="background: rgb(155 197 249 / 58%);">
    @foreach ($users as $user)
    @if ($user->id==$reply->id_user)
 <div class="row">
    <p style="margin:0 5px 0 10px">{{$user->name}}</p>
    @endif
    @endforeach
    <p style="margin:0 0 0 5px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
      </svg>{{$reply->created_at}}</p>

    </div>
</div>

<div class="col-1" style="background: rgb(155 197 249 / 58%);">
@if ($reply->image_url!=null)
<a href="" style="padding:5px 20px 5px 20px" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
  </svg></a>
  @endif
</div>

<div class="col-12 cont" style="background:">
<p style="margin-left: 5px">{{$reply->replica}}</p>
</div>

</div>
</div>
@endforeach

<form action="{{route('ticket_reply')}}" method="post" enctype="multipart/form-data">
    @csrf

    @foreach ($users as $user)
@if($ticket->usuario==$user->id)
    <input type="hidden" name="email_tick" value="{{$user->email}}">
@endif
@endforeach

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
    <span class='label' data-js-label>No file selected (optional)</label>
  </div>
</div>

</div>

<div class="col-12">
    <input type="hidden" name="tickid" value="{{$ticket->id}}">
    <input type="hidden" name="userid" value="{{Auth::user()->id}}">

    @if ($ticket->status=="Cerrado")
    <p class="float-right">Ticket Cerrado Ya no puedes Mandar Respuesta</p>
    @else
    <button type="submit" class="btn btn-success float-right" style="margin: 0 0 10px 10px">Responder</button>
    @endif
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

.cont{
    border-bottom: black 1px dashed;
    border-left: black 1px dashed;
    border-right: black 1px dashed;
}


</style>
@stop

@section('js')
<!-- estos son para la tabla-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script>

  //jquery para desvanecer el mensage
  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

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
