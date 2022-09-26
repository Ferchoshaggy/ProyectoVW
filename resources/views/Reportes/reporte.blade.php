@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">


@section('content')
<br>

<div class="card">
    <div class="card-body">

<div class="cajaP">

<div class="cajaH">
    <button class="btn form-control">Todos</button>
    <img src="{{asset('img/2tickets.png')}}" alt="" class="add">
</div>

<div class="cajaH">
    <button class="btn form-control">Abiertos</button>
</div>

<div class="cajaH">
    <button class="btn form-control">Cerrados</button>
</div>


</div>

    </div>
</div>


@stop

@section('css')

<style>

.cajaP{
display: flex;
justify-content: center;
}
.cajaH{
flex: auto;
margin: 0 10px;
justify-content: center;
}
.add{

        background-repeat:no-repeat;
        height:60px;
        width:70px;
        background-size: 50px 50px;
        background-position:center;
}

</style>

@stop

@section('js')

<script>


</script>


@stop
