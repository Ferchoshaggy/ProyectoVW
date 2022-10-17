@extends('adminlte::page')

@section('title', 'Nuevo Reporte')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>

<div class="card">
    <div class="card-body">

<!--alerta de guardado con exito -->

@if (Session::has('message'))
<br>
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-weight: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

        <form action="{{Route('report_save')}}" method="post" enctype="multipart/form-data">
@csrf
<!--opcion 1 la primera eleccion dependera de las demas opciones -->

<label for="IT"><i class="fas fa-laptop"></i>IT</label>
<div class="op">

<div class="caja">
<input type="radio" id="soporte" name="op1" value="Apoyo Tecnico" onclick="MostrarOP2(this.value);" >
<label for="soporte"><i class="fas fa-desktop"></i>Apoyo Tecnico</label>
</div>

<div class="caja">
<input type="radio" id="equipo" name="op1" value="Solicitar Equipo" onclick="MostrarOP2(this.value);">
<label for="equipo"><i class="fas fa-laptop-house"></i>Solicitar Equipo</label>
</div>
</div>

<!-- opcion 2 a elegir de apoyo tecnico -->
<div id="op2at" style="display:none" >
<hr>
<label for="Apoyo Tecnico"><i class="fas fa-desktop"></i>Apoyo Tecnico</label><br>
<small>Pida ayuda con TI u otros problemas relacionados con la tecnología.</small>
<div class="op">
    <div class="caja">
        <input type="radio" id="hardware" name="op2" value="Hardware" onclick="MostrarOP3(this.value);">
        <label for="hardware"><i class="fas fa-microchip"></i>Hardware</label>
    </div>

    <div class="caja">
        <input type="radio" id="software" name="op2" value="Software" onclick="MostrarOP3(this.value);">
        <label for="software"><i class="fas fa-cogs"></i>Software</label>
    </div>

</div>
</div>

<!-- opcion 2 a elegir de Solicitar Equipo -->

<div id="op2se" style="display: none">
    <hr>
    <label for="Solicitar equipo"><i class="fas fa-laptop-house"></i>Solicitar Equipo</label><br>
    <small>Solicitar hardware informático, periféricos u otros equipos de oficina</small>
    <div class="op row">
        <div class="caja">
            <input type="radio" id="hardwareN" name="op2" value="Hardware Nuevo" onclick="MostrarOP3(this.value);">
            <label for="hardwareN"><i class="fas fa-microchip"></i>Hardware Nuevo</label>
        </div>

        <div class="caja">
            <input type="radio" id="Nsoftware" name="op2" value="Nuevo Software" onclick="MostrarOP3(this.value);">
            <label for="Nsoftware"><i class="fas fa-cogs"></i>Nuevo Software</label>
        </div>

        <div class="caja">
            <input type="radio" id="Llave" name="op2" value="Restablecimiento Contraseña" onclick="MostrarOP3(this.value);">
            <label for="Llave"><i class="fas fa-key"></i>Restablecimineto de Contraseña</label>
        </div>

        <div class="caja">
            <input type="radio" id="Acceso" name="op2" value="Solicitar Acceso" onclick="MostrarOP3(this.value);">
            <label for="Acceso"><i class="fas fa-unlock"></i>Solicitar Acceso</label>
        </div>

        <div class="caja">
            <input type="radio" id="ASoftware" name="op2" value="Actualizar Software" onclick="MostrarOP3(this.value);">
            <label for="ASoftware"><i class="fas  fa-download"></i>Actualizar Software</label>
        </div>

    </div>
    </div>

<!-- opcion 3 a elegir de hardware Nuevo -->

<div id="op3hn" style="display: none">
    <hr>
    <label for="HarwareN"><i class="fas fa-microchip"></i>Hardware Nuevo</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="EscritorioN" name="op3" value="Escritorio/Portatil" onclick="MostrarForm(this.value);">
            <label for="EscritorioN"><i class="fas fa-laptop"></i>Escritorio/Portatil</label>
        </div>

        <div class="caja">
            <input type="radio" id="EquipoDered" name="op3" value="Equipo de Red" onclick="MostrarForm(this.value);">
            <label for="EquipoDered"><i class="fas  fa-wifi"></i>Equipo de Red</label>
        </div>

    </div>
</div>


<!-- opcion 3 a elegir de hardware -->

<div id="op3h" style="display: none">
    <hr>
    <label for="Hardware"><i class="fas fa-microchip"></i>Hardware</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="Escritorio" name="op3" value="Escritorio Portatil" onclick="MostrarForm(this.value);">
            <label for="Escritorio"><i class="fas fa-laptop"></i>Escritorio/Portatil</label>
        </div>

        <div class="caja">
            <input type="radio" id="red" name="op3" value="Red y Telefonos" onclick="MostrarForm(this.value);">
            <label for="red"><i class="fas fa-mobile"></i>Red y Telefonos</label>
        </div>

        <div class="caja">
            <input type="radio" id="impresora" name="op3" value="Impresora" onclick="MostrarForm(this.value);">
            <label for="impresora"><i class="fas fa-light fa-print"></i>Impresora</label>
        </div>

    </div>
</div>

<!-- opcion 3 a elegir de software -->

<div id="op3s" style="display:none">
    <hr>
    <label for="Software"><i class="fas fa-microchip"></i>Software</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="DB" name="op3" value="Base de Datos" onclick="MostrarForm(this.value);">
            <label for="DB"><i class="fas fa-database"></i>Base de Datos</label>
        </div>

        <div class="caja">
            <input type="radio" id="correo" name="op3" value="Email" onclick="MostrarForm(this.value);">
            <label for="correo"><i class="fas  fa-envelope"></i>Email</label>
        </div>

        <div class="caja">
            <input type="radio" id="Sala" name="op3" value="Office Suite" onclick="MostrarForm(this.value);">
            <label for="Sala"><i class="fas fa-file-word"></i>Office Suite</label>
        </div>

        <div class="caja">
            <input type="radio" id="dms" name="op3" value="DMS" onclick="MostrarForm(this.value);">
            <label for="dms"><i class="fas fa-stream"></i>DMS</label>
        </div>

        <div class="caja">
            <input type="radio" id="adp" name="op3" value="Aplicaciones de Planta" onclick="MostrarOP4(this.value);">
            <label for="adp"><i class="fas fa-car"></i>Aplicaciones de Planta</label>
        </div>

        <div class="caja">
            <input type="radio" id="otro" name="op3" value="Otro" onclick="MostrarOP4(this.value);">
            <label for="otro"><i class="fas fa-cog"></i>Otro</label>
        </div>

    </div>
</div>


<!-- opcion 4 a elegir de app de planta -->

<div id="op4a" style="display:none">
    <hr>
    <label for="ADP"><i class="fas fa-car"></i>Aplicaciones de Planta</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="vw" name="op4" value="Volkswagen" onclick="MostrarForm(this.value);">
            <label for="vw"><i><img src="{{asset('img/logotipos/volk.png')}}" alt="volkswagen" height="25px" width="25px"></i>Volkswagen</label>
        </div>

        <div class="caja">
            <input type="radio" id="seat" name="op4" value="SEAT" onclick="MostrarForm(this.value);">
            <label for="seat"><i><img src="{{asset('img/logotipos/seat.png')}}" alt="Seat" height="25px" width="25px"></i>SEAT</label>
        </div>

        <div class="caja">
            <input type="radio" id="Suzuki" name="op4" value="Suzuki" onclick="MostrarForm(this.value);">
            <label for="Suzuki"><i><img src="{{asset('img/logotipos/suzuki.png')}}" alt="Suzuki" height="25px" width="25px"></i>Suzuki</label>
        </div>

    </div>
</div>

<!-- opcion 4 a elegir otros-->

<div id="op4o" style="display:none">
    <hr>
    <label for="Apoyo Tecnico"><i class="fas fa-cog"></i>Otros</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="camaras" name="op4" value="Camaras" onclick="MostrarForm(this.value);">
            <label for="camaras"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16" style="margin: 0 5px">
                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z"/>
              </svg>Revicion de Camaras</label>
        </div>
    </div>
</div>

    <div id="formularioN" style="display: none">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Solicitud" onclick="ImpEle()">
            Crear Solicitud
          </button>


<!-- Modal Nueva solicitud -->
<div class="modal fade" id="Solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Solicitud</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
<div class="row">
    <div class="col align-self-start">
        <br>
            <h5 id="demo"></h5>
    </div>
<!--
    <div class="col align-self-end">
        <label for="Fuente">Fuente</label>
        <div style="border: 1px solid rgb(185, 184, 184); border-radius:0.4em;">
        <input type="radio" id="web" name="fuente" value="WEB" onchange="validarT();">
        <label for="web"><i class="fas fa-globe"></i>WEB</label>
        <input type="radio" id="tel" name="fuente" value="Telefono" onchange="validarT();">
        <label for="tel"><i class="fas fa-phone"></i>Telefono</label>
        <input type="radio" id="email" name="fuente" value="Email" onchange="validarT();">
        <label for="email"><i class="fas fa-envelope"></i>Email</label>
        <input type="radio" id="smg" name="fuente" value="SMG" onchange="validarT();">
        <label for="smg"><i class="fas  fa-comments"></i>SMG</label>
        <input type="radio" id="person" name="fuente" value="En Persona" onchange="validarT();">
        <label for="person"><i class="fas fa-users"></i>En Persona</label>
    </div>
    </div>
-->
</div>
            <div class="row">
@foreach ($usuario as $user)


<input class="form-control" type="hidden" name="idPerfil"
value="{{ Auth::user()->id}}">

                <div class="col-md-4">
        <label for="Usuario">Usuario</label>
        <input type="text" class="form-control" name="usuario" id="usuario" value="{{$user->name}}" disabled>
                </div>
@endforeach

                <div class="col-md-4">
                    <label for="type">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" onchange="validarT();">
                    <option selected="true" value="" disabled="disabled">Seleccione Tipo...</option>
                    <option value="Pregunta" @if (old('tipo') == "Pregunta") {{ 'selected' }} @endif>Pregunta</option>
                    <option value="Incidente" @if (old('tipo') == "Incidente") {{ 'selected' }} @endif>Incidente</option>
                    <option value="Peticion de Servicio" @if (old('tipo') == "Peticion de Servicio") {{ 'selected' }} @endif>Peticion de Servicio</option>
                    <option value="Solicitud de Cambio" @if (old('tipo') == "Solicitud de Cambio") {{ 'selected' }} @endif>Solicitud de Cambio</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="type">Prioridad</label>
                    <select name="prioridad" id="prioridad" class="form-control" onchange="validarT();">
                    <option selected="true" value="" disabled="disabled">Seleccione Prioridad...</option>
                    <option value="Emergencia" @if (old('tipo') == "Emergencia") {{ 'selected' }} @endif>Emergencia</option>
                    <option value="Alto" @if (old('tipo') == "Alto") {{ 'selected' }} @endif>Alto</option>
                    <option value="Bajo" @if (old('tipo') == "Bajo") {{ 'selected' }} @endif>Bajo</option>
                    <option value="Normal" @if (old('tipo') == "Normal") {{ 'selected' }} @endif>Normal</option>
                    </select>
                </div>

            </div>
            <div>
        <label for="Tema">Tema</label>
        <input type="text" class="form-control" name="tema" id="tema" onchange="validarT();">
            </div>

        <div>
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" rows="5" class="form-control" onchange="validarT();"></textarea>
        </div>

        <div class="row" style="padding-top:15px">
            <div class="col-md-6">
                <input type="file" name="archivo" class="form-control">
            </div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success" id="btnsave" disabled>Guardar</button>
        </div>
      </div>
    </div>
  </div>


    </div>

</form>
    </div>
</div>


@stop

@section('css')

<style>
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

    i{
        margin: 0 5px;
    }

input[type="radio"] {
    display: none;
}

.caja{

    margin: 0 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.op{

    display: flex;
    align-items:center;
    justify-content: center;

}
input:checked + label{
  color: rgb(6, 190, 247);
}


</style>

@stop

@section('js')


<script>

    //jquery para desvanecer el mensage
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

function validarT(){
 /*
let fuente=document.getElementsByName('fuente');

for(i = 0; i < fuente.length; i++) {
                if(fuente[i].checked)
        var fue=fuente[i].value;
            }
*/
let tipo=document.getElementById('tipo').value;
let prioridad=document.getElementById('prioridad').value;
let tema=document.getElementById('tema').value;
let descripcion=document.getElementById('descripcion').value;

if(tipo && prioridad && tema && descripcion){
    document.getElementById('btnsave').disabled=false;
}else{
    document.getElementById('btnsave').disabled=true;
}


}

   function MostrarOP2(dato){
    if(dato=="Apoyo Tecnico"){
        document.getElementById('op2at').style.display="block";
        document.getElementById("hardware").checked=false;
        document.getElementById("software").checked=false;

        document.getElementById('op3h').style.display="none";
        document.getElementById("Escritorio").checked=false;
        document.getElementById("red").checked=false;
        document.getElementById("impresora").checked=false;

        document.getElementById('op3s').style.display="none";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("dms").checked=false;
        document.getElementById("otro").checked=false;
        document.getElementById("adp").checked=false;

        document.getElementById('op3hn').style.display="none";
        document.getElementById("EscritorioN").checked=false;
        document.getElementById("EquipoDered").checked=false;
        document.getElementById("formularioN").style.display="none";

        document.getElementById("op4o").style.display="none";
        document.getElementById("vw").checked=false;

    }else{
        document.getElementById("formularioN").style.display="none";
        document.getElementById('op2at').style.display="none";
        document.getElementById("hardware").checked=false;
        document.getElementById("software").checked=false;

        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;
        document.getElementById("camaras").checked=false;
            }

     if(dato=="Solicitar Equipo"){
        document.getElementById('op2se').style.display="block";
        document.getElementById("hardwareN").checked=false;
        document.getElementById("Nsoftware").checked=false;
        document.getElementById("Llave").checked=false;
        document.getElementById("Acceso").checked=false;
        document.getElementById("ASoftware").checked=false;

        document.getElementById('op3h').style.display="none";
        document.getElementById("Escritorio").checked=false;
        document.getElementById("red").checked=false;
        document.getElementById("impresora").checked=false;

        document.getElementById('op3s').style.display="none";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("Sap").checked=false;
        document.getElementById("otro").checked=false;

        document.getElementById('op3hn').style.display="none";
        document.getElementById("EscritorioN").checked=false;
        document.getElementById("EquipoDered").checked=false;

     }else{
        document.getElementById('op2se').style.display="none";
        document.getElementById("hardwareN").checked=false;
        document.getElementById("Nsoftware").checked=false;
        document.getElementById("Llave").checked=false;
        document.getElementById("Acceso").checked=false;
        document.getElementById("ASoftware").checked=false;

        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;
        document.getElementById("camaras").checked=false;
     }

    }

   function MostrarOP3(dato){
    if(dato=="Hardware"){
        document.getElementById("op3h").style.display="block";
        document.getElementById("Escritorio").checked=false;
        document.getElementById("red").checked=false;
        document.getElementById("impresora").checked=false;
        document.getElementById("formularioN").style.display="none";
    }else{
        document.getElementById("op3h").style.display="none";
        document.getElementById("Escritorio").checked=false;
        document.getElementById("red").checked=false;
        document.getElementById("impresora").checked=false;
        document.getElementById("formularioN").style.display="none";

        document.getElementById("op4o").style.display="none";
        document.getElementById("camaras").checked=false;

        document.getElementById("op4a").style.display="none";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;

    }

    if(dato=="Software"){
        document.getElementById("op3s").style.display="block";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("dms").checked=false;
        document.getElementById("otro").checked=false;
        document.getElementById("adp").checked=false;

    }else{
        document.getElementById("op3s").style.display="none";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("dms").checked=false;
        document.getElementById("otro").checked=false;
        document.getElementById("adp").checked=false;

        document.getElementById("op4o").style.display="none";
        document.getElementById("camaras").checked=false;

        document.getElementById("op4a").style.display="none";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;
    }

    if(dato=="Hardware Nuevo"){
document.getElementById("op3hn").style.display="block";
document.getElementById("EscritorioN").checked=false;
document.getElementById("EquipoDered").checked=false;
    }else{
document.getElementById("op3hn").style.display="none";
document.getElementById("EscritorioN").checked=false;
document.getElementById("EquipoDered").checked=false;

    }
    if(dato=="Nuevo Software"){
        document.getElementById("formularioN").style.display="block";
    }

    if(dato=="Restablecimiento Contraseña"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Solicitar Acceso"){
        document.getElementById("formularioN").style.display="block";
    }

    if(dato=="Actualizar Software"){
        document.getElementById("formularioN").style.display="block";
    }
   }

   function MostrarForm(dato){

    if(dato=="Escritorio/Portatil"){
        document.getElementById("formularioN").style.display="block";
    }

    if(dato=="Equipo de Red"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Escritorio Portatil"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Red y Telefonos"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Impresora"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Base de Datos"){
        document.getElementById("formularioN").style.display="block";
        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
    }
    if(dato=="Email"){
        document.getElementById("formularioN").style.display="block";
        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
    }
    if(dato=="Office Suite"){
        document.getElementById("formularioN").style.display="block";
        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
    }
    if(dato=="DMS"){
        document.getElementById("formularioN").style.display="block";
        document.getElementById("op4a").style.display="none";
        document.getElementById("op4o").style.display="none";
    }
    if(dato=="Otro"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Nuevo Software"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Volkswagen"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="SEAT"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Suzuki"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Camaras"){
        document.getElementById("formularioN").style.display="block";
    }
   }

function  MostrarOP4(dato){
    if(dato=="Aplicaciones de Planta"){
        document.getElementById("op4a").style.display="block";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;
    }else{
        document.getElementById("op4a").style.display="none";
        document.getElementById("vw").checked=false;
        document.getElementById("seat").checked=false;
        document.getElementById("Suzuki").checked=false;
        document.getElementById("formularioN").style.display="none";
    }
    if(dato=="Otro"){
        document.getElementById("op4o").style.display="block";
        document.getElementById("camaras").checked=false;
    }else{
        document.getElementById("op4o").style.display="none";
        document.getElementById("camaras").checked=false;
        document.getElementById("formularioN").style.display="none";
    }
}

function ImpEle(){

let op1=document.querySelector('input[name=op1]:checked').value;
let op2=document.querySelector('input[name=op2]:checked').value;
let op3=document.querySelector('input[name=op3]:checked');
let op4=document.querySelector('input[name=op4]:checked')

if(op4!=null){
document.getElementById("demo").innerHTML = op1 +" > "+op2+" > "+op3.value+ " > "+op4.value;
}else if(op3!=null){
    document.getElementById("demo").innerHTML = op1 +" > "+op2+" > "+op3.value;
}else{
document.getElementById("demo").innerHTML = op1 +" > "+op2;
}
}

</script>


@stop
