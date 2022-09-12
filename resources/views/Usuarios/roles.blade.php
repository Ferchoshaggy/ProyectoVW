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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
<div class="profile-img">
<center>
                <img class="redondeo_img" src="https://picsum.photos/300/300" id="foto" data-toggle="modal" data-toggle="modal" data-target="#ver_foto"><br>
                <label>SIN FOTO, SE TE OTORGA UNA ALEATORIA</label><br>
                <label>PARA AGREGA UNA NUEVA FOTO  &nbsp;  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                </svg></label>
                <input type="file" name="foto" class="form-control" accept="image/*" id="foto_archivo" onchange="cambio_foto(this);">
            </center>
</div>
<br>

<div class="row">
    <div class="col-md-4">
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control">
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
        <input type="email" class="form-control" name="correo" id="correo">
    </div>
    <div class="col-md-6">
        <label for="correo">Contraseña</label>
<div class="input-group">
    <span class="input-group-append">
        <button class="btn btn-default" type="button" onclick="passRun();"><span class="fa fa-random"></span></button>
      </span>
        <input type="password" class="form-control" name="contraseña" id="contraseña">
        <span class="input-group-append">
            <button class="btn btn-default" type="button" id="show_password" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
          </span>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
<label for="Tipo">Tipo de Usuario</label>
<select name="tipo" id="tipo" class="form-control">
<option selected="true" disabled="disabled">Seleccione Tipo...</option>
<option value="Administrador">Administrador</option>
<option value="Usuario">Usuario</option>
</select>

    </div>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<!-- Desplegar tabla de usuarios con Table Boostrapt -->
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">App Paterno</th>
                    <th style="text-align: center;">App Materno</th>
                    <th style="text-align: center;">Correo</th>
                    <th style="text-align: center;">Tipo de Usuario</th>
                    <th style="text-align: center;">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: center;">Mark</td>
                    <td style="text-align: center;">Otto</td>
                    <td style="text-align: center;">@mdo</td>
                  </tr>

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
//funcion de la tabla funcion de boostrap
  $(document).ready(function() {
    $('.table').DataTable({
       "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
       }
    });
  });

  //funcion para mostrar la contraseña
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
    }

  </script>

@stop
