@extends('adminlte::page')

@section('title', 'Nuevo Reporte')

@section('content_header')

@section('content')


<div class="card">
    <div class="card-body">

<!--opcion 1 la primera eleccion dependera de las demas opciones -->

<label for="IT"><i class="fas fa-laptop"></i> IT</label>
<div class="op1">

<div class="caja1">
<input type="radio" id="soporte" name="op1" onclick="console.log('funciona')">
<label for="soporte"><i class="fas fa-desktop"></i>Apoyo Tecnico</label>
</div>

<div class="caja1">
<input type="radio" id="equipo" name="op1" onclick="console.log('no funciona')">
<label for="equipo"><i class="fas fa-laptop-house"></i>Solicitar Equipo</label>
</div>
</div>

<!-- opcion 2 a elegir dependiendo la opcion 1 -->
<div>
<hr>
<label for="Apoyo Tecnico"><i class="fas fa-desktop"></i>Apoyo Tecnico</label><br>
<small>Pida ayuda con TI u otros problemas relacionados con la tecnología.</small>
<div class="op1">
    <div class="caja1">
        <input type="radio" id="hardware" name="op2" onclick="console.log('no funciona')">
        <label for="hardware"><i class="fas fa-laptop-house"></i>Hardware</label>
    </div>

    <div class="caja1">
        <input type="radio" id="software" name="op2" onclick="console.log('no funciona')">
        <label for="software"><i class="fas fa-laptop-house"></i>software</label>
    </div>

</div>
</div>


    </div>
</div>


@stop

@section('css')

<style>

input[type="radio"] {
    display: none;
}

.caja1{

    width: 20%;
    justify-content: center;
}

.op1{

    display: flex;
    align-items:center;
    justify-content: center;

}
input:checked + label {
  color: red;
}

/* Elemento Radio, cuando está marcado */
input[type="radio"]:checked {
  box-shadow: 0 0 0 3px orange;
}

</style>

@stop

@section('js')

<script>


</script>


@stop
