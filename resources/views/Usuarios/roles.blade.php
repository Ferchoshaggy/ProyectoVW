@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

@section('content')




<div class="card">
    <div class="card-body">

<!--Boton de nuevo usuarios -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUser">
    Nuevo Usuario
  </button>
  <br><br>

  <!--Modal de nuevo Usuario -->
  <div class="modal fade" id="agregarUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('save_users')}}" method="POST">
            @csrf
        <div class="modal-body">


<div class="row">
    <div class="col-md-4">
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control"  onchange="validar();" >
    </div>
    <div class="col-md-4">
    <label for="App">Apellido Paterno</label>
    <input type="text" name="appaterno" id="appaterno" class="form-control">
    </div>
    <div class="col-md-4">
    <label for="Apm">Apellido Materno</label>
    <input type="text" name="apmaterno" id="apmaterno" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="correo" id="correo" onchange="validar();">
    </div>
    <div class="col-md-6">
        <label for="Tipo">Tipo de Usuario</label>
        <select name="tipo" id="tipo" class="form-control" onchange="validar()">
        <option selected="true" value="" disabled="disabled">Seleccione Tipo...</option>
        <option value="1" >Administrador</option>
        <option value="2">Usuario</option>
        </select>
        </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="correo">Contraseña</label>
<div class="input-group">
    <span class="input-group-append">
        <button class="btn btn-default" type="button" onclick="passRun(); validar();"><span class="fa fa-random"></span></button>
      </span>
        <input type="password" class="form-control" name="contraseña" id="contraseña" onchange="validar();">
        <span class="input-group-append">
            <button class="btn btn-default" type="button" id="show_password" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
          </span>
        </div>
    </div>

    <div class="col-md-6">
        <label for="correo">Repetir Contraseña</label>
<div class="input-group">
    <span class="input-group-append">
        <button class="btn btn-default" type="button" onclick="passRun(); validar();"><span class="fa fa-random"></span></button>
      </span>
        <input type="password" class="form-control" name="Rcontraseña" id="Rcontraseña" onchange="validar();">
        <span class="input-group-append">
            <button class="btn btn-default" type="button" id="R_show_password" onclick="mostrarPassword2()"><span class="fa fa-eye-slash icon2"></span></button>
          </span>
        </div>
    </div>
</div>

<div id="conf" style="display: none">
    <h5 style="color: red">Las contraseñas no Coinciden</h5>
</div>

<div id="cont" style="display: none">
    <h5 style="color: green">Las contraseñas Coinciden</h5>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success" id="guardar" disabled>Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<!-- Desplegar tabla de usuarios con Table Boostrapt -->
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">App Paterno</th>
                    <th style="text-align: center;">App Materno</th>
                    <th style="text-align: center;">Correo</th>
                    <th style="text-align: center;">Tipo de Usuario</th>
                    <th style="text-align: center;">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @foreach ($tipos as $tipo)
                    @if ($user->tipo_user==$tipo->id)
                    <tr>
                        <td style="text-align: center;">{{$user->name}}</td>
                        <td style="text-align: center;">{{$user->ape_pat}}</td>
                        <td style="text-align: center;">{{$user->ape_mat}}</td>
                        <td style="text-align: center;">{{$user->email}}</td>
                        <td style="text-align: center;">{{$tipo->tipo}}</td>
                        <td style="text-align: center;">btn</td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach


                </tbody>
              </table>


        </div>


    </div>
</div>



@stop

@section('css')

<style type="text/css">

/*estilos del input file*/
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
/*estilos de la imagen mostrada*/
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

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script type="text/javascript">

//funcion de la tabla de boostrap tenga paginador y buscador
  $(document).ready(function() {
    $('.table').DataTable({
       "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
       }
    });
  });

  //funcion para mostrar la contraseña con un boton
  function mostrarPassword(){
		var cambio = document.getElementById("contraseña");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}

    function mostrarPassword2(){
		var cambio = document.getElementById("Rcontraseña");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}

 //funcion para crear contraseña aleatorias
    function passRun(){

const minus = "abcdefghijklmnñopqrstuvwxyz";
const mayus = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

var contraseña = '';

for (var i = 1; i <= 8; i++) {
  var eleccion = Math.floor(Math.random() * 3 + 1);

  if (eleccion == 1) {
    var caracter1 = minus.charAt(Math.floor(Math.random() * minus.length));
    contraseña += caracter1;
  } else {
    if (eleccion == 2) {
      var caracter2 = mayus.charAt(Math.floor(Math.random() * mayus.length));
      contraseña += caracter2;
    } else {
      var num = Math.floor(Math.random() * 10);

      contraseña += num;
    }
  }

}
document.getElementById('contraseña').value=contraseña;
document.getElementById('Rcontraseña').value=contraseña;

    }


function validar(){
    var contra=document.getElementById('contraseña').value;
    var rContra=document.getElementById('Rcontraseña').value;
    var contraIgual=false;

if(contra && rContra){


    if(contra != rContra){
document.getElementById("cont").style.display="none";
document.getElementById("conf").style.display="block";

    }else{
 document.getElementById("conf").style.display="none";
 document.getElementById("cont").style.display="block";
 contraIgual=true;
    }
}

let nombre=document.getElementById('nombre').value;
let correo=document.getElementById('correo').value;
let tipo=document.getElementById('tipo').value;


    if(nombre && correo && tipo && contraIgual){
   document.getElementById('guardar').disabled=false;
    }else{
        document.getElementById('guardar').disabled=true;
    }
}



  </script>

@stop
