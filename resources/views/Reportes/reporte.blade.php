@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>

<div class="card">
    <div class="card-body">

        <ul class="nav nav-pills cajaP">
            <li class="nav-item cajaH">
              <a class="nav-link active btn btn2" id="table-todo" data-toggle="tab" href="#tableT" role="tab" aria-controls="tableT" aria-selected="false"><img src="{{asset('img/2tickets.png')}}" alt="todo" class="add">Todos</a>
            </li>
            <li class="nav-item cajaH">
              <a class="nav-link btn btn2" id="table-abirto" data-toggle="tab" href="#tableA" role="tab" aria-controls="tableA" aria-selected="false"><img src="{{asset('img/abierto.png')}}" alt="abierto" class="add">Abiertos</a>
            </li>
            <li class="nav-item cajaH">
                <a class="nav-link btn btn2" id="table-cerrado" data-toggle="tab" href="#tableC" role="tab" aria-controls="tableC" aria-selected="false"><img src="{{asset('img/cerrado.png')}}" alt="cerrado" class="add">Cerrado</a>
              </li>
          </ul>

<hr>

<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="tableT" role="tabpanel" aria-labelledby="table-todo">


<!-- tabla para los reportes -->
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center;">Tipo</th>
            <th style="text-align: center;">Prioridad</th>
            <th style="text-align: center;">Tema</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Creacion</th>
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

<div class="tab-pane fade"  id="tableA" role="tabpanel" aria-labelledby="table-abierto">
    <!-- tabla para los reportes -->
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center;">Tipo</th>
            <th style="text-align: center;">Prioridad</th>
            <th style="text-align: center;">Tema</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Creacion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
            @foreach ($users as $user )
            @if ($reporte->status=="Abierto")
            @if ($reporte->usuario==$user->id)
          <tr class="marca" @if(Auth::user()->tipo_user==1) onclick="pasar_id({{$reporte->id}});" @endif>
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}} {{$user->ape_pat}}</td>
            <td style="text-align: center;">{{$reporte->tipo}}</td>
            <td style="text-align: center;">{{$reporte->prioridad}}</td>
            <td style="text-align: center;">{{$reporte->tema}}</td>
            <td style="text-align: center; background:rgb(67, 177, 67)">{{$reporte->status}}</td>
            <td style="text-align: center;">{{$reporte->created_at}}</td>
          </tr>
          @endif
          @endif
          @endforeach
          @endforeach
        </tbody>
      </table>

</div>
</div>

<div class="tab-pane fade"  id="tableC" role="tabpanel" aria-labelledby="table-cerrado">
        <!-- tabla para los reportes -->
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center;">Tipo</th>
            <th style="text-align: center;">Prioridad</th>
            <th style="text-align: center;">Tema</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Creacion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
            @foreach ($users as $user )
            @if ($reporte->status=="Cerrado")
            @if ($reporte->usuario==$user->id)
          <tr class="marca" @if(Auth::user()->tipo_user==1) onclick="pasar_id({{$reporte->id}});" @endif>
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}} {{$user->ape_pat}}</td>
            <td style="text-align: center;">{{$reporte->tipo}}</td>
            <td style="text-align: center;">{{$reporte->prioridad}}</td>
            <td style="text-align: center;">{{$reporte->tema}}</td>
            <td style="text-align: center; background:rgb(245, 80, 80)">{{$reporte->status}}</td>
            <td style="text-align: center;">{{$reporte->created_at}}</td>
          </tr>
          @endif
          @endif
          @endforeach
          @endforeach
        </tbody>
      </table>

</div>
</div>


<!--menu de opciones de la tabla-->
<div id="menu_opciones" class="visible_off " style=" padding: 20px; background-color: #6e82c2bd;">

    <button type="button" class="close" style="margin-right: -17px; margin-top: -20px;" onclick="cerrar_menu();">
       <i class="fas fa-times fa-xs"></i>
    </button>

  <button type="button" class="btn btn-warning form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#cerrar_ticket" onclick="cambiarC_ticket();">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
      </svg>
    Cerrado
  </button>
  <br>
  <button class="btn btn-success form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#abierto_ticket" onclick="cambiarA_ticket();">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
      </svg>
    Abierto
  </button>
  <br>
  <button class="btn btn-info form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#ver_ticket" onclick="ver_tickte();" >
    <i class="fas fa-eye"></i>
    Ver
  </button>
  <br>
  <button class="btn btn-danger form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#borrar_ticket" onclick="tickte_delete();" >
    <i class="fas fa-trash"></i>
    Borrar
  </button>
</div>

<!-- modal de eliminar ticket-->
<div class="modal fade" id="borrar_ticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
          </div>
          <form action="" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                <label style="font-family: cursive; font-size: 25px; display:flex; justify-content: center;align-items: center; height: 100%;">¿Quieres Eliminar El ticket?</label><br><br>
                  <div style="text-align: center;">
                      <label style="font-family: cursive; font-size: 25px;" id="labeleliminar"></label><br>
                      <label style="font-family: cursive; font-size: 25px;" id="labelusuario"></label>
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id_ticket" id="id_ticket">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button class="btn btn-danger" >Eliminar</button>
              </div>
          </form>
      </div>
    </div>
  </div>







</div>
</div>
</div>
@stop

@section('css')

<style>
/*botones de los navs */

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
.btn2{
    flex: auto;
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
/*estilo active*/
.nav-link {
            color: green;
        }

        .nav-item>a:hover {
            color: green;
        }

        /*code to change background color*/
        .navbar-nav>.active>a {
            background-color: #C0C0C0;
            color: green;
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

  //jquery para desvanecer el mensage
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

//cuadro de opciones

var id_ticket=null;
    function pasar_id($id_tr) {
        id_ticket=$id_tr;
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

</script>


@stop
