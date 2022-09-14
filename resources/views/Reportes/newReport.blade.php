@extends('adminlte::page')

@section('title', 'Nuevo Reporte')

@section('content_header')

@section('content')


<div class="card">
    <div class="card-body">
        <form action="get">

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
            <input type="radio" id="EscritorioN" name="op3" value="Escritorio/Portatil" onclick="">
            <label for="EscritorioN"><i class="fas fa-laptop"></i>Escritorio/Portatil</label>
        </div>

        <div class="caja">
            <input type="radio" id="EquipoDered" name="op3" value="Equipo de Red" onclick="">
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
            <input type="radio" id="Escritorio" name="op3" value="Escritorio" onclick="">
            <label for="Escritorio"><i class="fas fa-laptop"></i>Escritorio/Portatil</label>
        </div>

        <div class="caja">
            <input type="radio" id="red" name="op3" value="Red y Telefonos Inteligentes" onclick="MostrarOP4(this.value);">
            <label for="red"><i class="fas fa-mobile"></i>Red y Telefonos Inteligentes</label>
        </div>

        <div class="caja">
            <input type="radio" id="impresora" name="op3" value="Impresora" onclick="">
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
            <input type="radio" id="DB" name="op3" value="Base de Datos" onclick="">
            <label for="DB"><i class="fas fa-database"></i>Base de Datos</label>
        </div>

        <div class="caja">
            <input type="radio" id="correo" name="op3" value="Email" onclick="">
            <label for="correo"><i class="fas  fa-envelope"></i>Email</label>
        </div>

        <div class="caja">
            <input type="radio" id="Sala" name="op3" value="Office Suite" onclick="">
            <label for="Sala"><i class="fas fa-file-word"></i>Office Suite</label>
        </div>

        <div class="caja">
            <input type="radio" id="Sap" name="op3" value="SAP" onclick="">
            <label for="Sap"><i class="fas fa-stream"></i>SAP</label>
        </div>

        <div class="caja">
            <input type="radio" id="otro" name="op3" value="Otro" onclick="">
            <label for="otro"><i class="fas  fa-cog"></i>Otro</label>
        </div>

    </div>
</div>



<!-- opcion 4 a elegir de Red y Telefonos Inteligentes -->

<div id="op4rt" style="display: none">
    <hr>
    <label for="Apoyo Tecnico"><i class="fas fa-mobile"></i>Red y Telefonos Inteligentes</label><br>
    <div class="op">
        <div class="caja">
            <input type="radio" id="android" value="Android" name="op4">
            <label for="android"><i class="fas fa-mobile"></i>Android</label>
        </div>

        <div class="caja">
            <input type="radio" id="mora" value="Blackberry" name="op4">
            <label for="mora"><i class="fas fa-mobile-alt"></i>Blackberry</label>
        </div>

        <div class="caja">
            <input type="radio" id="iPhone" value="iPhone" name="op4">
            <label for="iPhone"><i class="fas fa-mobile"></i>iPhone</label>
        </div>

    </div>
</div>


<button type="submit">a</button>
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
    }else{
        document.getElementById('op2at').style.display="none";
        document.getElementById("hardware").checked=false;
        document.getElementById("software").checked=false;
            }

     if(dato=="Solicitar Equipo"){
        document.getElementById('op2se').style.display="block";
     }else{
        document.getElementById('op2se').style.display="none";
        document.getElementById("hardwareN").checked=false;
        document.getElementById("Nsoftware").checked=false;
        document.getElementById("Llave").checked=false;
        document.getElementById("Acceso").checked=false;
        document.getElementById("Asoftware").checked=false;
     }

    }



   function MostrarOP3(dato){

   }

   function MostrarOP4(dato){

   }

   function MostrarForm(dato){

   }




</script>


@stop
