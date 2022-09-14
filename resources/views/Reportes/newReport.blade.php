@extends('adminlte::page')

@section('title', 'Nuevo Reporte')

@section('content_header')

@section('content')


<div class="card">
    <div class="card-body">
        <form action="" method="get" enctype="multipart/form-data">

<!--opcion 1 la primera eleccion dependera de las demas opciones -->

<label for="IT"><i class="fas fa-laptop"></i> IT</label>
<div class="op">

<div class="caja">
<input type="radio" id="soporte" name="op1" value="Apoyo Tecnico" onclick="MostrarOP2(this.value);">
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
    <label for="Apoyo Tecnico"><i class="fas fa-laptop-house"></i>Solicitar Equipo</label><br>
    <small>Solicitar hardware informático, periféricos u otros equipos de oficina</small>
    <div class="op">
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
    <label for="Apoyo Tecnico"><i class="fas fa-microchip"></i>Hardware Nuevo</label><br>
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
    <label for="Apoyo Tecnico"><i class="fas fa-microchip"></i>Hardware</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="Escritorio" name="op3" value="Escritorio Portatil" onclick="MostrarForm(this.value);">
            <label for="Escritorio"><i class="fas fa-laptop"></i>Escritorio/Portatil</label>
        </div>

        <div class="caja">
            <input type="radio" id="red" name="op3" value="Red y Telefonos Inteligentes" onclick="MostrarForm(this.value);">
            <label for="red"><i class="fas fa-mobile"></i>Red y Telefonos Inteligentes</label>
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
    <label for="Apoyo Tecnico"><i class="fas fa-microchip"></i>Software</label><br>
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
            <input type="radio" id="Sap" name="op3" value="SAP" onclick="MostrarForm(this.value);">
            <label for="Sap"><i class="fas fa-stream"></i>SAP</label>
        </div>

        <div class="caja">
            <input type="radio" id="otro" name="op3" value="Otro" onclick="MostrarForm(this.value);">
            <label for="otro"><i class="fas  fa-cog"></i>Otro</label>
        </div>

    </div>
</div>



    <div id="formularioN" style="display: none">
        <hr>
       <center><h3>Nueva Solicitud</h3></center>
    <div class="row">
        <div class="col-md-5">
<label for="Usuario">Usuario</label>
<input type="text" class="form-control" name="usuario" value="">
        </div>

        <div class="col-md-5">
            <label for="Fuente">Fuente</label>
            <div class="form-control">
            <input type="radio" id="web" name="fuente" value="WEB">
            <label for="web"><i class="fas fa-globe"></i>WEB</label>
            <input type="radio" id="tel" name="fuente" value="Telefono">
            <label for="tel"><i class="fas fa-phone"></i>Telefono</label>
            <input type="radio" id="email" name="fuente" value="Email">
            <label for="email"><i class="fas fa-envelope"></i>Email</label>
            <input type="radio" id="smg" name="fuente" value="SMG">
            <label for="smg"><i class="fas  fa-comments"></i>SMG</label>
            <input type="radio" id="person" name="fuente" value="En Persona">
            <label for="person"><i class="fas fa-users"></i>En Persona</label>
        </div>
        </div>

        <div class="col-md-2">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
            <option value="Pregunta">Pregunta</option>
            <option value="Incidente">Incidente</option>
            <option value="Incidente Importante">Incidente Importante</option>
            <option value="Peticion de Servicio">Peticion de Servicio</option>
            <option value="Problema">Problema</option>
            <option value="Solicitud de Cambio">Solicitud de Cambio</option>

            </select>
        </div>

    </div>
    <div>
<label for="Tema">Tema</label>
<input type="text" class="form-control" name="tema">
    </div>

<div>
<label for="descripcion">Descripcion</label>
<textarea name="descripcion" id="descripcion" rows="5" class="form-control"></textarea>
</div>

<div class="row" style="padding-top:10px">
    <div class="col-md-3">
        <input type="file" name="archivo" class="btn-primary">
    </div>

    <div class="col-md-7"></div>

    <div class="col-md-2">
         <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
    </div>

</form>
    </div>
</div>


@stop

@section('css')

<style>
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
input:checked + label {
  color: rgb(6, 190, 247);
}



</style>

@stop

@section('js')

<script>



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
        document.getElementById("Sap").checked=false;
        document.getElementById("otro").checked=false;

        document.getElementById('op3hn').style.display="none";
        document.getElementById("EscritorioN").checked=false;
        document.getElementById("EquipoDered").checked=false;

    }else{
        document.getElementById('op2at').style.display="none";
        document.getElementById("hardware").checked=false;
        document.getElementById("software").checked=false;
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
    }

    if(dato=="Software"){
        document.getElementById("op3s").style.display="block";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("Sap").checked=false;
        document.getElementById("otro").checked=false;

    }else{
        document.getElementById("op3s").style.display="none";
        document.getElementById("DB").checked=false;
        document.getElementById("correo").checked=false;
        document.getElementById("Sala").checked=false;
        document.getElementById("Sap").checked=false;
        document.getElementById("otro").checked=false;
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
document.getElementById("op4hn").style.display="none";
    }

    if(dato=="Restablecimiento Contraseña"){
        document.getElementById("op4hn").style.display="none";
    }

    if(dato=="Actualizar Software"){
        document.getElementById("op4hn").style.display="none";
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
    if(dato=="Red y Telefonos Inteligentes"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Impresora"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Base de Datos"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Email"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Office Suite"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="SAP"){
        document.getElementById("formularioN").style.display="block";
    }
    if(dato=="Otro"){
        document.getElementById("formularioN").style.display="block";
    }

   }




</script>


@stop
