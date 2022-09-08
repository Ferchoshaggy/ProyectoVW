@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

@section('content')


<div class="card">
    <div class="card-body" style="display: flex">

 <div title="IT"></div>

<div style="padding-right: 10px">
<label for="IT">IT</label><br>
<input type="radio" name="categoria1" value="ApoyoTecnico" onchange="cat1(this.value);">Apoyo tecnico
<br>
<input type="radio" name="categoria1" value="SolicitarEquipo" onchange="cat1(this.value);">Solicitar Equipo
</div>

<div id="apoyo" class="v-line" style="visibility:">
    <label for="">Apoyo Tecnico</label><br>
    <small>Pida ayuda con TI u otros Problemas Relacionados <br> con la Tecnologia.</small><br>
    <input type="radio" name="categoria2" value="Hardware">Hardware
    <br>
    <input type="radio" name="categoria2" value="Software">Software
</div>

    </div>
</div>


@stop

@section('css')

<style>
    .v-line{
 border-left: 1px solid #000;
 height:100%;
 left: 20%;
 padding-left: 10px

}
</style>

@stop

@section('js')

<script>
function cat1(dato1){
    if(dato1=='ApoyoTecnico'){

    }else if(dato1=='SolicitarEquipo')
       console.log("2");
}

</script>


@stop
