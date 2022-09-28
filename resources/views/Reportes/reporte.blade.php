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
    <button class="btn" id="todo"><img src="{{asset('img/2tickets.png')}}" alt="todo" class="add">Todos</button>
</div>

<div class="cajaH">

    <button class="btn"><img src="{{asset('img/abierto.png')}}" alt="" class="add">Abiertos</button>
</div>

<div class="cajaH">
    <button class="btn"><img src="{{asset('img/cerrado.png')}}" alt="" class="add">Cerrados</button>
</div>

</div>
<hr>

<!-- tabla para los reportes -->
<div class="table-responsive">
    <table class="table" style="width: 100%">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center;">Tipo</th>
            <th style="text-align: center;">Prioridad</th>
            <th style="text-align: center;">Tema</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Fecha de Creacion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
            @foreach ($users as $user )
            @if ($reporte->usuario==$user->id)
          <tr class="marca" @if(Auth::user()->tipo_user==1) onclick="pasar_id({{$reporte->id}});" @endif>
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}} {{$user->ape_pat}}</td>
            <td style="text-align: center;">{{$reporte->tipo}}</td>
            <td style="text-align: center;">{{$reporte->prioridad}}</td>
            <td style="text-align: center;">{{$reporte->tema}}</td>
            @if($reporte->status=="Abierto")
            <td style="text-align: center; background:rgb(67, 177, 67)">{{$reporte->status}}</td>
            @else
            <td style="text-align: center; background:rgb(245, 80, 80)">{{$reporte->status}}</td>
            @endif
            <td style="text-align: center;">{{$reporte->created_at}}</td>
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

<style>

.cajaP{
display: flex;
justify-content: center;
}
.cajaH{
flex: auto;
margin: 0 10px;
justify-content: center;
align-items: center;
}
.add{

        background-repeat:no-repeat;
        height:50px;
        width:50px;
        background-size: 50px 50px;
        background-position:center;
}
.btn{
    flex: auto;
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


</script>


@stop
