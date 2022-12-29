@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
<br>

<div class="card">
    <div class="card-body">

 <!--alertas -->

@if (Session::has('message'))
<br>

@if(Session::get('message')== "Se Elimino correctamente el Ticket")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "Se Cambio el Ticket Correctamente")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "El ticket Fue asignado")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@endif

        <ul class="nav cajaP">
            <li class="nav-item cajaH">
              <a class="nav-link active btn btn2" id="table-todo" data-toggle="tab" href="#tableT" role="tab" aria-controls="tableT" aria-selected="true"><img src="{{asset('img/editar.png')}}" alt="todo" class="add">Todos</a>
            </li>
            <li class="nav-item cajaH">
              <a class="nav-link btn btn2" id="table-abirto" data-toggle="tab" href="#tableA" role="tab" aria-controls="tableA" aria-selected="false"><img src="{{asset('img/prohibido.png')}}" alt="abierto" class="add">Sin Resolver</a>
            </li>
            <li class="nav-item cajaH">
                <a class="nav-link btn btn2" id="table-revision" data-toggle="tab" href="#tableR" role="tab" aria-controls="tableR" aria-selected="false"><img src="{{asset('img/temporizador.png')}}" alt="revicion" class="add">Contestados</a>
              </li>
            <li class="nav-item cajaH">
                <a class="nav-link btn btn2" id="table-cerrado" data-toggle="tab" href="#tableC" role="tab" aria-controls="tableC" aria-selected="false"><img src="{{asset('img/seguro.png')}}" alt="cerrado" class="add">Resueltos</a>
              </li>
          </ul>
<hr>
@if (Auth::user()->tipo_user==1)
<div style="padding-bottom: 10px">
<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_pdf"><i class="fas fa-file-pdf-o" style="padding-right: 5px"></i>PDF</button>
<button class="btn btn-outline-success" data-toggle="modal" data-target="#modal_xls"><i class="fas fa-file-excel-o" style="padding-right: 5px"></i>EXCEL</button>
</div>
@endif

  <!-- Modal Descargar PDF-->
  <div class="modal fade" id="modal_pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Filtros PDF</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <form action="{{url('/pdf_report')}}" method="POST" target="_blank">
        @csrf

<div class="row">
<div class="col-md-6">
<label for="fechaMIN">Fecha Minima</label>
<input type="date" class="form-control" name="fechamin" id="fmin1" onchange="validar_pdf()">
</div>
<div class="col-md-6">
    <label for="fechaMAX">Fecha Maxima</label>
    <input type="date" class="form-control" name="fechamax" id="fmax1" onchange="validar_pdf()">
</div>
</div>

<div class="row">
<div class="col-md-12">
<label for="diseño">Concecionaria</label>
<select class="form-control" name="diseño" id="diseño1" onchange="validar_pdf()">
    <option selected="true" value="" disabled="disabled">Diseño a Escoger...</option>
    <option value="Fersan"  @if (old('concesionaria') == "Fersan") {{ 'selected' }} @endif>Fersan Motors Volkswagen</option>
    <option value="Chaixtsu"  @if (old('concesionaria') == "Chaixtsu") {{ 'selected' }} @endif>Chaixtsu Motors Suzuki</option>
    <option value="Navarra"  @if (old('concesionaria') == "Navarra") {{ 'selected' }} @endif>SEAT Navarra Motors</option>
</select>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <label for="diseño">Filtracion</label>
    <select class="form-control" name="filtracion" id="filtracion1" onchange="validar_pdf()">
        <option selected="true" value="" disabled="disabled">Seleccione La filtracion...</option>
        <option value="todos">Sin filtracion</option>
        <option value="FMIT">Codigos Fersan</option>
        <option value="CMIT">Codigos Chaixtsu</option>
        <option value="NMIT">Codigos Navarra</option>
    </select>
    </div>
</div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="viewPDF" disabled>Visualizar PDF</button>
          </div>
        </div>
    </form>
      </div>
    </div>

 <!-- Modal Descargar Excel-->
 <div class="modal fade" id="modal_xls" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Filtros Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <form action="{{url('/excel_report')}}" method="POST" target="_blank">
        @csrf

<div class="row">
<div class="col-md-6">
<label for="fechaMIN">Fecha Minima</label>
<input type="date" class="form-control" name="fechamin" id="fmin2" onchange="validar_xls()">
</div>
<div class="col-md-6">
    <label for="fechaMAX">Fecha Maxima</label>
    <input type="date" class="form-control" name="fechamax" id="fmax2" onchange="validar_xls()">
</div>
</div>

<div class="row">
<div class="col-md-12">
<label for="diseño">Concecionaria</label>
<select class="form-control" name="diseño" id="diseño2" onchange="validar_xls()">
    <option selected="true" value="" disabled="disabled">Diseño a Escoger...</option>
    <option value="Fersan"  @if (old('concesionaria') == "Fersan") {{ 'selected' }} @endif>Fersan Motors Volkswagen</option>
    <option value="Chaixtsu"  @if (old('concesionaria') == "Chaixtsu") {{ 'selected' }} @endif>Chaixtsu Motors Suzuki</option>
    <option value="Navarra"  @if (old('concesionaria') == "Navarra") {{ 'selected' }} @endif>SEAT Navarra Motors</option>
</select>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <label for="diseño">Filtracion</label>
    <select class="form-control" name="filtracion" id="filtracion2" onchange="validar_xls()">
        <option selected="true" value="" disabled="disabled">Seleccione La filtracion...</option>
        <option value="todos">Sin filtracion</option>
        <option value="FMIT">Codigos Fersan</option>
        <option value="CMIT">Codigos Chaixtsu</option>
        <option value="NMIT">Codigos Navarra</option>
    </select>
    </div>
    </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="viewXLS" disabled>Descargar Excel</button>
          </div>
        </div>
    </form>
      </div>
    </div>

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="tableT" role="tabpanel" aria-labelledby="table-todo">

<!-- tabla para los reportes -->
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center">Asignado</th>
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
          <tr class="marca" onclick="pasar_id({{$reporte->id}});">
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}}</td>
            <td style="text-align: center;">{{$reporte->fuente}}</td>
            <td style="text-align: center;">{{$reporte->tipo}}</td>
            <td style="text-align: center;">{{$reporte->prioridad}}</td>
            <td style="text-align: center;">{{$reporte->tema}}</td>
            @if($reporte->status=="Abierto")
            <td style="text-align: center; background:rgb(67, 177, 67)">{{$reporte->status}}</td>
            @elseif($reporte->status=="Cerrado")
            <td style="text-align: center; background:rgb(245, 80, 80)">{{$reporte->status}}</td>
            @else
            <td style="text-align: center; background:rgb(247, 148, 1)">{{$reporte->status}}</td>
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
    <table class="table table-sm">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center">Asignado</th>
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
          <tr class="marca" onclick="pasar_id({{$reporte->id}});">
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}}</td>
            <td style="text-align: center;">{{$reporte->fuente}}</td>
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

<div class="tab-pane fade" id="tableR" role="tabpanel" aria-labelledby="table-revision">
        <!-- tabla para los reportes -->
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Ticket ID</th>
                    <th style="text-align: center;">Solicita</th>
                    <th style="text-align: center">Asignado</th>
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
                    @if ($reporte->status=="Contestado")
                    @if ($reporte->usuario==$user->id)
                  <tr class="marca" onclick="pasar_id({{$reporte->id}});">
                    <td style="text-align: center;">{{$reporte->codigo}}</td>
                    <td style="text-align: center;">{{$user->name}}</td>
                    <td style="text-align: center;">{{$reporte->fuente}}</td>
                    <td style="text-align: center;">{{$reporte->tipo}}</td>
                    <td style="text-align: center;">{{$reporte->prioridad}}</td>
                    <td style="text-align: center;">{{$reporte->tema}}</td>
                    <td style="text-align: center; background:rgb(247, 148, 1)">{{$reporte->status}}</td>
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
    <table class="table table-sm">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Ticket ID</th>
            <th style="text-align: center;">Solicita</th>
            <th style="text-align: center">Asignado</th>
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
          <tr class="marca" onclick="pasar_id({{$reporte->id}});">
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}}</td>
            <td style="text-align: center;">{{$reporte->fuente}}</td>
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
<div id="menu_opciones" class="visible_off " style="padding:15px; background-color: #6e82c2bd;">

    <button type="button" class="close" style="margin-right: -10px; margin-top: -10px;" onclick="cerrar_menu();">
       <i class="fas fa-times fa-xs" style="width: 15; height:15;"></i>
    </button>

    @if(Auth::user()->tipo_user==1)
  <button type="button" class="btn-sm btn-warning btn3" data-toggle="modal" data-target="#cerrar_ticket" onclick="cambiar_ticket();">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
      </svg>
    Cerrar
  </button>
  <br>
@endif

@if(Auth::user()->tipo_user==1)
<button class="btn-sm btn-success btn3" data-toggle="modal" data-target="#asignar_ticket" onclick="tickte_asignado();" >
    <i class='fas fa-user-edit'></i>
  Asignar
</button>
@endif

  <button class="btn-sm btn-info btn3" onclick="ver_tickte();" >
    <i class="fas fa-comments"></i>
    Responder
  </button>
  <br>

  @if(Auth::user()->tipo_user==1)
  <button class="btn-sm btn-danger btn3" data-toggle="modal" data-target="#borrar_ticket" onclick="tickte_delete();" >
    <i class="fas fa-trash"></i>
    Borrar
  </button>
  @endif

</div>

<!-- modal de eliminar ticket-->
<div class="modal fade" id="borrar_ticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
          </div>
          <form action="{{Route('ticket_delete')}}" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                <label style="font-family: cursive; font-size: 25px; display:flex; justify-content: center;align-items: center; height: 100%;">¿Quieres Eliminar El ticket?</label><br>
                  <div style="text-align: center;">
                      <label style="font-family: cursive; font-size: 25px;" id="labeleliminar"></label><br>
                      <label style="font-family: cursive; font-size: 25px;" id="labeltema"></label>
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

  <!-- modal de cambiar ticket-->
<div class="modal fade" id="cerrar_ticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cambiar Status</h5>
          </div>
          <form action="{{Route('cambiar_status')}}" method="POST">
              @csrf
              <div class="modal-body">
                <label style="font-family: cursive; font-size: 25px; display:flex; justify-content: center;align-items: center; height: 100%;">¿Quieres Cambiar el Status del Ticket?</label><br>
                  <div style="text-align: center;">
                      <label style="font-family: cursive; font-size: 25px;" id="labelcambiar"></label><br>
                      <label style="font-family: cursive; font-size: 25px;" id="labeltema2"></label><br>
                      <label style="font-family: cursive; font-size: 25px;" id="labelstatus"></label>
                  </div>
                  <textarea name="soluciones" id="solucion" cols="30" class="form-control" placeholder="Soluciones"></textarea>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id_ticket" id="id_ticket2">
                  <input type="hidden" name="id_usuario" id="id_usuario">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button class="btn btn-success" id="btnCam">Cambiar</button>
              </div>
          </form>
      </div>
    </div>
  </div>

  <!-- modal de asignar ticket-->

  <div class="modal fade" id="asignar_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar Personal al Ticket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route("asignar_ticket")}}" method="POST">
            @csrf
        <div class="modal-body">

<select name="asignacion" id="asignacion" class="js-example-basic-single form-control" style="width: 100%; height: 15px;" onchange="validar_asig()">
    <option selected="true" value="" disabled="disabled">Seleccione un Tecnico...</option>
    @foreach ($users as $user)
@if ($user->tipo_user==1)
<option value="{{$user->name}}">{{$user->name}}</option>
@endif
@endforeach
</select>

      </div>
        <div class="modal-footer">
            <input type="hidden" name="id_ticket" id="id_ticketA">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-success" id="asigTick" disabled>Guardar</button>
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
        padding-right: 5px;
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
.paginate_button{
    position:sticky;
}
.btn3{
  font-weight: bold;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  margin: 5px;
}
</style>

@stop

@section('js')

<!-- estos son para la tabla-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<!-- este es para el selected2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

$('.js-example-basic-single').select2({
            dropdownParent: $('#asignar_ticket') //este se agrega para que se despliegue bien en el modal.
        });

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

function validar_asig(){

$select=document.getElementById("asignacion").value

if($select){
document.getElementById("asigTick").disabled=false;
}else{
document.getElementById("asigTick").disabled=true;
}

}

function tickte_delete(){

$.ajax({
  url: "{{url('/ticket_search')}}"+'/'+id_ticket,
  dataType: "json",
  //context: document.body
}).done(function(datosTicket) {

  if(datosTicket==null){
    document.getElementById("labeleliminar").innerHTML=null;
    document.getElementById("labeltema").innerHTML=null;
    document.getElementById("id_ticket").value=null;
  }else{
    document.getElementById("labeleliminar").innerHTML=datosTicket.codigo;
    document.getElementById("labeltema").innerHTML=datosTicket.tema;
    document.getElementById("id_ticket").value=datosTicket.id;
  }

});
}

function ver_tickte(){
 location.href ="{{url('/replyreport')}}/"+id_ticket;
}

function tickte_asignado(){
    $.ajax({
  url: "{{url('/ticket_search')}}"+'/'+id_ticket,
  dataType: "json",
  //context: document.body
}).done(function(datosTicket) {

  if(datosTicket==null){
    document.getElementById("id_ticketA").value=null;
  }else{
    document.getElementById("id_ticketA").value=datosTicket.id;
  }
  $("#asignacion").val('').trigger('change')

});
}


function cambiar_ticket(){
    $.ajax({
  url: "{{url('/ticket_search')}}"+'/'+id_ticket,
  dataType: "json",
  //context: document.body
}).done(function(datosTicket) {

  if(datosTicket==null){
    document.getElementById("labelcambiar").innerHTML=null;
    document.getElementById("labeltema2").innerHTML=null;
    document.getElementById("labelstatus").innerHTML=null;
    document.getElementById("id_ticket2").value=null;
    document.getElementById("id_usuario").value=null;
  }else{
    document.getElementById("labelcambiar").innerHTML=datosTicket.codigo;
    document.getElementById("labeltema2").innerHTML=datosTicket.tema;
    document.getElementById("labelstatus").innerHTML="El tickets esta: "+datosTicket.status;
    document.getElementById("id_ticket2").value=datosTicket.id;
    document.getElementById("id_usuario").value=datosTicket.usuario;
  }

let a=value=datosTicket.status;

if(a=="Cerrado"){
document.getElementById("btnCam").disabled=true;
}else{
    document.getElementById("btnCam").disabled=false;
}

document.getElementById("solucion").value=null;

});
}

function validar_pdf(){
let fecmin=document.getElementById('fmin1').value;
let fecmax=document.getElementById('fmax1').value;
let diseño=document.getElementById('diseño1').value;
let filtro=document.getElementById('filtracion1').value;

if(fecmin && fecmax && diseño && filtro){
    document.getElementById('viewPDF').disabled=false;
}else{
    document.getElementById('viewPDF').disabled=true;
}
}

function validar_xls(){
let fecmin=document.getElementById('fmin2').value;
let fecmax=document.getElementById('fmax2').value;
let diseño=document.getElementById('diseño2').value;
let filtro=document.getElementById('filtracion2').value;

if(fecmin && fecmax && diseño && filtro){
    document.getElementById('viewXLS').disabled=false;
}else{
    document.getElementById('viewXLS').disabled=true;
}
}

</script>

@stop

@section('footer')

<p style="margin: 0px">
    © 2022-<?php echo date("Y");?> <a href="https://vw-fersan.com.mx/" target="_blank">Volkswagen Fersan Motors S.A de C.V.,</a>
</p>
@stop
