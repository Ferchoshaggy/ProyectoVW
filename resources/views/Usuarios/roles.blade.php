@extends('adminlte::page')
@section('title', 'Usuarios')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>
<div class="card">
    <div class="card-body">

<!--alertas -->

@if (Session::has('message'))
<br>

@if(Session::get('message')== "Usuario Guardado con Éxito")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "Se Elimino correctamente el Usuario")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "Se cambio Al Usuario con Exito")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@endif

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
        <form action="{{Route('save_users')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">


<div class="row">
    <div class="col-md-4">
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" onchange="validar();" >
    </div>
    <div class="col-md-4">
    <label for="App">Apellido Paterno</label>
    <input type="text" name="appaterno" id="appaterno" value="{{old("appaterno")}}" class="form-control">
    </div>
    <div class="col-md-4">
    <label for="Apm">Apellido Materno</label>
    <input type="text" name="apmaterno" id="apmaterno" value="{{old("apmaterno")}}" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
<label for="Genero">Genero</label>
<select class="form-control" name="genero" id="genero" onchange="validar();">
    <option selected="true" value="" disabled="disabled">Seleccione Genero...</option>
    <option value="Femenino" @if (old('genero') == "Femenino") {{ 'selected' }} @endif>Femenino</option>
    <option value="Masculino" @if (old('genero') == "Masculino") {{ 'selected' }} @endif>Masculino</option>
</select>
    </div>

    <div class="col-md-6">
 <label for="Cconcesionaria">Concesionaria</label>
<select class="form-control" name="concesionaria" id="concesionaria" onchange="validar();">
    <option selected="true" value="" disabled="disabled">Seleccione Concesionaria...</option>
    <option value="Fersan"  @if (old('concesionaria') == "Fersan") {{ 'selected' }} @endif>Fersan Motors Volkswagen</option>
    <option value="Chaixtsu"  @if (old('concesionaria') == "Chaixtsu") {{ 'selected' }} @endif>Chaixtsu Motors Suzuki</option>
    <option value="Navarra"  @if (old('concesionaria') == "Navarra") {{ 'selected' }} @endif>SEAT Navarra Motors</option>
</select>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{old("correo")}}" onchange="validar();">
    </div>

    <div class="col-md-6">
        <label for="Tipo">Tipo de Usuario</label>
        <select name="tipo" id="tipo" class="form-control" onchange="validar()">
        <option selected="true" value="" disabled="disabled">Seleccione Tipo...</option>
        <option value="1" @if (old('tipo') == "1") {{ 'selected' }} @endif>Administrador</option>
        <option value="2" @if (old('tipo') == "2") {{ 'selected' }} @endif>Usuario</option>
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
        @error('contraseña')
        <p class="form-text text-danger">La contrasela debe tener 8 o mas digitos</p>
         @enderror
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
            <table class="table" style="width: 100%">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">App Paterno</th>
                    <th style="text-align: center;">App Materno</th>
                    <th style="text-align: center;">Correo</th>
                    <th style="text-align: center;">Tipo de Usuario</th>
                    <th style="text-align: center;">Concesionaria</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @foreach ($tipos as $tipo)
                    @if ($user->tipo_user==$tipo->id)
                    <tr class="marca" @if(Auth::user()->tipo_user==1) onclick="pasar_id({{$user->id}});" @endif>
                        <td style="text-align: center;">{{$user->name}}</td>
                        <td style="text-align: center;">{{$user->ape_pat}}</td>
                        <td style="text-align: center;">{{$user->ape_mat}}</td>
                        <td style="text-align: center;">{{$user->email}}</td>
                        <td style="text-align: center;">{{$tipo->tipo}}</td>
                        <td style="text-align: center;">{{$user->concesionaria}}</td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>


  <!--menu de opciones de la tabla-->
  <div id="menu_opciones" class="visible_off " style=" padding: 20px; background-color: #6e82c2bd;">

    <button type="button" class="close" style="margin-right: -17px; margin-top: -20px;" onclick="cerrar_menu();">
       <i class="fas fa-times fa-xs"></i>
    </button>

  <button type="button" class="btn btn-warning form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#editar_usuario" onclick="cambiar_user();">
    <i class="fas fa-edit"></i>
    Editar
  </button>
  <br>
  <button class="btn btn-danger form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#eliminar_usuario" onclick="datos_delete();" >
    <i class="fas fa-trash"></i>
    Eliminar
  </button>
</div>


<!-- modal de eliminar usuario-->
<div class="modal fade" id="eliminar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
          </div>
          <form action="{{Route('user_delete')}}" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                <label style="font-family: cursive; font-size: 25px; display:flex; justify-content: center;align-items: center; height: 100%;">¿Quieres Eliminar al Usuario?</label><br><br>
                  <div style="text-align: center;">
                      <label style="font-family: cursive; font-size: 25px;" id="labeleliminar"></label><br>
                      <label style="font-family: cursive; font-size: 25px;" id="labelcorreo"></label>
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id_user" id="id_user">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button class="btn btn-danger" >Eliminar</button>
              </div>
          </form>
      </div>
    </div>
  </div>


<!-- modal de Editar usuario-->
<div class="modal fade" id="editar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cambiar Usuario</h5>
          </div>
          <form action="{{ Route('cambiar_users')}}" method="POST">
              @csrf
              <div class="modal-body">

                  <div class="row" >
<div class="col-md-12">
    <label for="Cconcesionaria">Concesionaria</label>
<select class="form-control" name="concesionaria" id="concesionaria">
    <option selected="true" value="" disabled="disabled">Seleccione Concesionaria...</option>
    <option value="Fersan"  @if (old('concesionaria') == "Fersan") {{ 'selected' }} @endif>Fersan Motors Volkswagen</option>
    <option value="Chaixtsu"  @if (old('concesionaria') == "Chaixtsu") {{ 'selected' }} @endif>Chaixtsu Motors Suzuki</option>
    <option value="Navarra"  @if (old('concesionaria') == "Navarra") {{ 'selected' }} @endif>SEAT Navarra Motors</option>
</select>


</div>
 </div>

 <div class="row" >
    <div class="col-md-12">
        <label for="Tipo">Tipo de Usuario</label>
        <select name="tipo" id="tipo" class="form-control">
        <option selected="true" value="" disabled="disabled">Seleccione Tipo...</option>
        <option value="1" @if (old('tipo') == "1") {{ 'selected' }} @endif>Administrador</option>
        <option value="2" @if (old('tipo') == "2") {{ 'selected' }} @endif>Usuario</option>
        </select>
    </div>
     </div>

              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id_user_edit" id="id_user_edit">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button class="btn btn-success " id="button_2">Actualizar</button>
              </div>
          </form>
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

/*Estilo para el cuadro de opciones*/

      .marca{
        transition: 1s;
    }
    .marca:hover{
        background: #8a98d6;
        transition: 1s;
    }
    .visible_on{
        display: block;
        position: fixed;
        background: white;
        border-radius: 15px;
        width: auto;
    }
    .visible_off{
        display: none;
    }
  </style>


@stop

@section('js')

<!-- estos son para la tabla-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

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

//validar campos
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
}else{
    document.getElementById("cont").style.display="none";
    document.getElementById("conf").style.display="none";
}

let nombre=document.getElementById('nombre').value;
let correo=document.getElementById('correo').value;
let tipo=document.getElementById('tipo').value;
let gen=document.getElementById('genero').value;
let con=document.getElementById('concesionaria').value;

if(nombre && correo && tipo && contraIgual && gen && con){
   document.getElementById('guardar').disabled=false;
 }else{
        document.getElementById('guardar').disabled=true;
    }
}

//jquery para desvanecer el mensage
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});


//cuadro de opciones

var id_user=null;
    function pasar_id($id_tr) {
        id_user=$id_tr;
        var coordenadas_y=event.clientY; //odtenemos el valor de la posicion del boton
        var coordenadas_x=event.clientX; //odtenemos el valor de la posicion del boton
        menu_opciones.style.top=coordenadas_y-50+"px";
        menu_opciones.style.left=coordenadas_x-50+"px";
        menu_opciones.classList.add("visible_on");
        menu_opciones.classList.remove("visible_off");
      //alert($id_tr);
    }
    menu_opciones.addEventListener("mouseleave",function(){
          menu_opciones.classList.remove("visible_on");
          menu_opciones.classList.add("visible_off");
    });
    function cerrar_menu(){
        menu_opciones.classList.remove("visible_on");
        menu_opciones.classList.add("visible_off");
    }

    function datos_delete(){

$.ajax({
  url: "{{url('/search_user')}}"+'/'+id_user,
  dataType: "json",
  //context: document.body
}).done(function(datosUser) {

  if(datosUser==null){
    document.getElementById("labeleliminar").innerHTML=null;
    document.getElementById("id_user").value=null;
  }else{
    document.getElementById("labeleliminar").innerHTML=datosUser.name;
    document.getElementById("labelcorreo").innerHTML=datosUser.email;
    document.getElementById("id_user").value=datosUser.id;

  }

});

}

function cambiar_user(){

$.ajax({
    url: "{{url('/search_user')}}"+'/'+id_user,
  dataType: "json",
  //context: document.body
}).done(function(datosUser) {

  if(datosUser==null){
    document.getElementById("concesionaria").value=null;
    document.getElementById("tipo").value=null;
    document.getElementById("id_user_edit").value=null;

  }else{

    document.getElementById("concesionaria").value=datosUser.concesionaria;
    document.getElementById("tipo").value=datosUser.tipo_user;
    document.getElementById("id_user_edit").value=datosUser.id;


  }

});

}
  </script>

@stop
