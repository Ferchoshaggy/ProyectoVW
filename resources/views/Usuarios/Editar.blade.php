@extends('adminlte::page')

@section('title', 'EditarPerfil')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>
<div class="card">
    <center><h2>Editar Perfil</h2></center>
    <div class="card-body">

<!--alerta de Guardado con exito -->

@if (Session::has('message'))
<br>

@if(Session::get('message')== "Datos Actualizados con Exito")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "La Contraseña Actual No es correcta")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@endif

<form action="{{Route('user_update')}}" method="POST" enctype="multipart/form-data">
@csrf
@foreach ($usuarios as $usuario)
@foreach ($tipos as $tipo)
@if ($usuario->tipo_user==$tipo->id)

    <div class="col-md-12" style="text-align: center; margin-bottom: 10px;">

        @if($usuario->foto==null)
        <img class="redondeo_img" src="{{asset('ImgUser/usuario.png')}}" id="foto"><br>
        <label>SIN FOTO</label><br>
        <label>PARA AGREGAR&nbsp;</label>
        <input type="file" name="foto" class="form-control" accept="image/*" id="foto_archivo" onchange="cambiar_foto(this);">
        @else
        <img class="redondeo_img" src="imgUser/{{$usuario->foto}}" id="foto"><br>
        <label>FOTO ACTUAL</label><br>
        <label>PARA CAMBIARLA&nbsp;</label>
        <input type="file" name="foto" class="form-control" accept="image/*" id="foto_archivo" onchange="cambiar_foto(this);">
        @endif
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <label for="Nombre">Nombre Completo</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuario->name}}" readonly>
                </div>
        </div>

<div class="row">
    <div class="col-md-6">
        <label for="Genero">Genero</label>
        <select class="form-control" name="genero" id="genero">

            @if ($usuario->genero=="Masculino")
            <option value="Masculino">{{$usuario->genero}}</option>
            <option value="Femenino">Femenino</option>

            @elseif($usuario->genero=="Femenino")
            <option value="Femenino">{{$usuario->genero}}</option>
            <option value="Masculino">Masculino</option>

            @else
            @endif

        </select>
            </div>

<div class="col-md-6">
         <label for="Cconcesionaria">Concesionaria</label>
            @if($usuario->concesionaria=="Fersan")
            <input type="text" value="Fersan Motors Volkswagen" class="form-control" name="concesionaria" id="concesionaria" readonly>

            @elseif ($usuario->concesionaria=="Chaixtsu")
            <input type="text" value="Chaixtsu Motors Suzuki" class="form-control" name="concesionaria" id="concesionaria" readonly>

            @elseif($usuario->concesionaria=="Navarra")
            <input type="text" value="SEAT Navarra Motors" class="form-control" name="concesionaria" id="concesionaria" readonly>

            @else
            @endif
            </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{$usuario->email}}" readonly>
    </div>
    <div class="col-md-6">
        <label for="Tipo">Tipo de Usuario</label>

<input type="text" name="tipo" id="tipo" class="form-control" value="{{$tipo->tipo}}" readonly>
</div>
</div>
<br>

<button type="button" class="accordion form-control" onclick="divD()">Cambiar Contraseña</button>
<div class="panel">

    <div class="row">
        <div class="col-md-4">
            <label for="correo">Contraseña Actual</label>
            <input type="password" class="form-control" name="passAA" id="passAA" value="{{old('passAA')}}" onchange="passVerficar();">
        </div>

        <div class="col-md-4">
            <label for="correo">Nueva Contraseña</label>
            <input type="password" class="form-control" name="passN" id="passN" value="{{old('passN')}}" onchange="passVerficar();">
        </div>

        <div class="col-md-4">
            <label for="correo">Repetir Contraseña</label>
            <input type="password" class="form-control" name="passRN" id="passRN" value="{{old('passRN')}}" onchange="passVerficar();">
        </div>

    </div>

</div>

<div id="conf" style="display: none">
    <h5 style="color: red">Las contraseñas no Coinciden</h5>
</div>

<div id="cont" style="display: none">
    <h5 style="color: green">Las contraseñas Coinciden</h5>
</div>

<br>
<button type="submit" id="actualizar" class="btn btn-success form-control" >Actualizar</button>
    </div>

</form>
@endif
@endforeach
@endforeach
</div>
    </div>

@stop

@section('css')

<style type="text/css">
    input[type="file"]{
          background: white;
          outline: none;
      }
      ::-webkit-file-upload-button{
        margin-top: -20px;
        margin-left: -12px;
        background: #00A1D8;
        color: white;
        height: 35px;
        border: none;
        outline: none;
        font-weight: bolder;
        cursor: pointer;
        border-radius: 5px;
      }
      ::-webkit-file-upload-button:hover{
        background: #111111;
      }
      .redondeo_img{
        margin-bottom: 20px;
        border-radius: 100px;
        width: 200px;
        height: 200px;
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.15);
        transition: 1s;
      }
      .redondeo_img:hover{
        transition: 1s;
        border-radius: 10px;
        cursor: pointer;
      }
/*Div desplegable */
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\02795';
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2796";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.6s ease-in-out;
    opacity: 0;
}
div.panel.show {
    opacity: 1;
    max-height: 500px;
}
  </style>

@stop

@section('js')

<script type="text/javascript">

function divD(){
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}}

//jquery para desvanecer el mensage
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

function cambiar_foto(file){
    if(file.files[0]==null){
      document.getElementById("foto").src="{{asset('ImgUser/usuario.png')}}";

    }else{
     document.getElementById("foto").src= (window.URL ? URL : webkitURL).createObjectURL(file.files[0]);

    }
    var nombre_archivo=file.files[0].name;
    //alert(nombre_archivo);
    if(nombre_archivo.toLowerCase().indexOf(".png")!==-1 || nombre_archivo.toLowerCase().indexOf(".jpg")!==-1 || nombre_archivo.toLowerCase().indexOf(".gif")!==-1 || nombre_archivo.toLowerCase().indexOf(".ico")!==-1 || nombre_archivo.toLowerCase().indexOf(".svg")!==-1){

    }else{

      document.getElementById("foto").src="{{asset('ImgUser/usuario.png')}}";
      alert("la extencion de la imagen no es valido");
      document.getElementById("foto_archivo").value="";
    }
  }

function passVerficar(){
    let PA=document.getElementById("passAA").value;
    let PN=document.getElementById("passN").value;
    let PR=document.getElementById("passRN").value;

    if(PA!="" || PN!="" || PR!=""){
       document.getElementById('actualizar').disabled=true;

       if(PN && PR){

if(PN != PR){
document.getElementById("cont").style.display="none";
document.getElementById("conf").style.display="block";

}else{
document.getElementById("conf").style.display="none";
document.getElementById("cont").style.display="block";

if(PA && PN && PR)
document.getElementById('actualizar').disabled=false;
}

}else{
    document.getElementById("cont").style.display="none";
    document.getElementById("conf").style.display="none";
}

    }else{
       document.getElementById('actualizar').disabled=false;
    }
}

</script>

@stop
