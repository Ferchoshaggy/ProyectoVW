@extends('adminlte::page')

@section('title', 'EditarPerfil')

@section('content_header')

@section('content')
<br>
<div class="card">
    <center><h2>Editar Perfil</h2></center>
    <div class="card-body">

<form action="" method="GET" enctype="multipart/form-data">
@csrf
@foreach ($usuarios as $usuario)
@foreach ($tipos as $tipo)
@if ($usuario->tipo_user==$tipo->id)

<div class="row">
    <div class="col-md-5" style="text-align: center; margin-bottom: 10px;">

        @if($usuario->foto==null)
        <img class="redondeo_img" src="{{asset('ImgUser/usuario.png')}}" id="foto" data-toggle="modal" data-toggle="modal" data-target="#ver_foto"><br>
        <label>SIN FOTO</label><br>
        <label>PARA AGREGAR&nbsp;</label>
        <input type="file" name="foto" class="form-control" accept="image/*" id="foto_archivo" onchange="cambio_foto(this);">
        @else
        <img class="redondeo_img" src="fotos_users\{{$dato->foto}}" id="foto" data-toggle="modal" data-toggle="modal" data-target="#ver_foto"><br>
        <label>FOTO ACTUAL</label><br>
        <label>PARA CAMBIARLA&nbsp;</label>
        <input type="file" name="foto" class="form-control" accept="image/*" id="foto_archivo" onchange="cambio_foto(this);">
        @endif
    </div>

    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuario->name}}" >
                </div>
                <div class="col-md-4">
                <label for="App">Apellido Paterno</label>
                <input type="text" name="appaterno" id="appaterno" value="{{$usuario->ape_pat}}" class="form-control">
                </div>
                <div class="col-md-4">
                <label for="Apm">Apellido Materno</label>
                <input type="text" name="apmaterno" id="apmaterno" value="{{$usuario->ape_mat}}" class="form-control">
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
        <select class="form-control" name="concesionaria" id="concesionaria">
            @if($usuario->concesionaria=="Fersan")
            <option value="Fersan">Fersan Motors Volkswagen</option>
            <option value="Chaixtsu">Chaixtsu Motors Suzuki</option>
            <option value="Navarra">SEAT Navarra Motors</option>

            @elseif ($usuario->concesionaria=="Chaixtsu")
            <option value="Chaixtsu">Chaixtsu Motors Suzuki</option>
            <option value="Fersan">Fersan Motors Volkswagen</option>
            <option value="Navarra">SEAT Navarra Motors</option>

            @elseif($usuario->concesionaria=="Navarra")
            <option value="Navarra">SEAT Navarra Motors</option>
            <option value="Fersan">Fersan Motors Volkswagen</option>
            <option value="Chaixtsu">Chaixtsu Motors Suzuki</option>

            @else
            @endif

        </select>
            </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{$usuario->email}}" disabled>
    </div>
    <div class="col-md-6">
        <label for="Tipo">Tipo de Usuario</label>

<input type="text" name="tipo" id="tipo" class="form-control" value="{{$tipo->tipo}}" disabled>

        </div>
</div>


    </div>
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
  </style>


@stop

@section('js')

@stop
