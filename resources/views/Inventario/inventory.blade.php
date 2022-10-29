@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<br>
<div class="card">
    <div class="card-body">

 @if (Session::has('message'))
<br>

@if(Session::get('message')== "Se Importo el Excel con exito")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('message')== "Algo salio mal, Revisa tu excel con las reglas")
<div class="alert alert-{{ Session::get('color') }}" role="alert" style="font-family: cursive;">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@endif


<button class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalForm">Nuevo Registro</button>
<button class="btn btn-outline-warning" data-toggle="modal" data-target="#ModalCarga">Importar Excel</button>
<br><br>

<div class="table-responsive">
    <table class="table table-sm">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center;">Puesto</th>
            <th style="text-align: center;">Departamento</th>
            <th style="text-align: center;">Marca</th>
            <th style="text-align: center;">Modelo</th>
            <th style="text-align: center;">No.de serie</th>
            <th style="text-align: center;">Procesador</th>
            <th style="text-align: center;">Ghz</th>
            <th style="text-align: center;">Disco</th>
            <th style="text-align: center;">Mem Ram</th>
            <th style="text-align: center;">Sistema Operativo</th>
            <th style="text-align: center;">Monitor</th>
            <th style="text-align: center;">Marca</th>
            <th style="text-align: center;">Modelo</th>
            <th style="text-align: center;">Adicional</th>
            <th style="text-align: center;">Nomenclatura</th>
            <th style="text-align: center;">I-Portal</th>
            <th style="text-align: center;">Correo de Planta</th>
            <th style="text-align: center;">Correo Institucional</th>
            <th style="text-align: center;">Portal de Distribuidores</th>
            <th style="text-align: center;">GEKO</th>
            <th style="text-align: center;">Clave Telefonica</th>
            <th style="text-align: center;">IP</th>
            <th style="text-align: center;">SIF</th>
            <th style="text-align: center;">POC</th>
            <th style="text-align: center;">NADCOM</th>
            <th style="text-align: center;">SAGA</th>
            <th style="text-align: center;">Modelo de Impresora</th>
            <th style="text-align: center;">Fecha compra</th>
            <th style="text-align: center;">Factura</th>
            <th style="text-align: center;">Garantia</th>
            <th style="text-align: center;">Grupo Fortinet</th>
            <th style="text-align: center;">CPU o laptop</th>
            <th style="text-align: center;">Usuario de red</th>
            <th style="text-align: center;">Programas Instalados</th>
            <th style="text-align: center;">VNC</th>
            <th style="text-align: center;">Adobe</th>
            <th style="text-align: center;">GDS</th>
            <th style="text-align: center;">Antivirus</th>
            <th style="text-align: center;">Office</th>
            <th style="text-align: center;">Mantenimiento</th>
            <th style="text-align: center;">Usuario de GDS</th>
            <th style="text-align: center;">Regulador</th>
            <th style="text-align: center;">Marca Modelo</th>
          </tr>
        </thead>
        <tbody>
@foreach ($datos as $dato)
<tr class="marca" onclick="pasar_id({{$dato->id}});">
    <th style="text-align: center;">{{$dato->Nombre_de_Usuario}}</th>
    <th style="text-align: center;">{{$dato->Puesto}}</th>
    <th style="text-align: center;">{{$dato->Departamento}}</th>
    <th style="text-align: center;">{{$dato->Marca}}</th>
    <th style="text-align: center;">{{$dato->Modelo}}</th>
    <th style="text-align: center;">{{$dato->No_de_Serie}}</th>
    <th style="text-align: center;">{{$dato->Procesador}}</th>
    <th style="text-align: center;">{{$dato->Ghz}}</th>
    <th style="text-align: center;">{{$dato->Disco}}</th>
    <th style="text-align: center;">{{$dato->Mem_Ram}}</th>
    <th style="text-align: center;">{{$dato->Sistema_Operativo}}</th>
    <th style="text-align: center;">{{$dato->Monitor}}</th>
    <th style="text-align: center;">{{$dato->Marca_Monitor}}</th>
    <th style="text-align: center;">{{$dato->Modelo_Monitor}}</th>
    <th style="text-align: center;">{{$dato->ADICIONAL}}</th>
    <th style="text-align: center;">{{$dato->Nomenclatura}}</th>
    <th style="text-align: center;">{{$dato->I_Portal}}</th>
    <th style="text-align: center;">{{$dato->Correo_de_Planta}}</th>
    <th style="text-align: center;">{{$dato->Correo_Institucional}}</th>
    <th style="text-align: center;">{{$dato->Portal_de_Distribuidores}}</th>
    <th style="text-align: center;">{{$dato->GEKO}}</th>
    <th style="text-align: center;">{{$dato->Clave_Telefonica}}</th>
    <th style="text-align: center;">{{$dato->IP}}</th>
    <th style="text-align: center;">{{$dato->SIF}}</th>
    <th style="text-align: center;">{{$dato->POC}}</th>
    <th style="text-align: center;">{{$dato->NADCON}}</th>
    <th style="text-align: center;">{{$dato->SAGA}}</th>
    <th style="text-align: center;">{{$dato->Modelo_de_impresora}}</th>
    <th style="text-align: center;">{{$dato->FECHA_COMPRA}}</th>
    <th style="text-align: center;">{{$dato->FACTURA}}</th>
    <th style="text-align: center;">{{$dato->GARANTIA}}</th>
    <th style="text-align: center;">{{$dato->GRUPO_FORTINET}}</th>
    <th style="text-align: center;">{{$dato->CPU_O_LAPTOP}}</th>
    <th style="text-align: center;">{{$dato->USUARIO_DE_RED}}</th>
    <th style="text-align: center;">{{$dato->Programas_Instalados}}</th>
    <th style="text-align: center;">{{$dato->VNC}}</th>
    <th style="text-align: center;">{{$dato->Adobe}}</th>
    <th style="text-align: center;">{{$dato->GDS}}</th>
    <th style="text-align: center;">{{$dato->Antivirus}}</th>
    <th style="text-align: center;">{{$dato->OFFICE}}</th>
    <th style="text-align: center;">{{$dato->MANTENIMIENTO}}</th>
    <th style="text-align: center;">{{$dato->USUARIO_DE_GDS}}</th>
    <th style="text-align: center;">{{$dato->REGULADOR}}</th>
    <th style="text-align: center;">{{$dato->MARCA_MODELO}}</th>
  </tr>
@endforeach
        </tbody>
      </table>
</div>

<!--menu de opciones de la tabla-->
<div id="menu_opciones" class="visible_off " style=" padding: 20px; background-color: #6e82c2bd;">

    <button type="button" class="close" style="margin-right: -17px; margin-top: -20px;" onclick="cerrar_menu();">
       <i class="fas fa-times fa-xs"></i>
    </button>

  <button type="button" class="btn btn-warning form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#editar_dato">
    <i class="fas fa-edit"></i>
    Editar
  </button>
  <br>
  <button class="btn btn-danger form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#eliminar_dato"  >
    <i class="fas fa-trash"></i>
    Eliminar
  </button>
  <br>
  <button class="btn btn-danger form-control" style="margin-bottom: 10px; font-weight: bold;" data-toggle="modal" data-target="#pdf_dato"  >
    <i class="fas fa-trash"></i>
    Generar Responsiba
  </button>
</div>

<!-- Modal de importar -->
<div class="modal fade" id="ModalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Importar Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<div class="row">
<div class="col-md-6">
<div style="padding: 40px; text-align:center;">
    <a href="{{Route('descarga_plantilla')}}" class="btn btn-outline-info form-control">Plantilla</a>
</div>
</div>


<div class="col-md-6">
    <div class="wrapper" style="padding: 40px; text-align:center;">
        <h5>Importar Excel</h5>
        <form action="{{Route('inventory_up')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <input type="file" id="file-input" name="archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <label for="file-input">
           <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
              </svg>
              <span></span>
        </label>
        <i class="fa fa-times-circle remove"></i>
      </div>
</div>


</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="ImpXls" class="btn btn-primary" disabled>Importar</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<!-- Modal de crear -->
<div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


</div>
</div>

@stop

@section('css')
<style>
    /*Boton de importar file*/

.wrapper #file-input{
  display:none;
}

.wrapper label[for='file-input'] *{
  vertical-align:middle;
  cursor:pointer;
}

.wrapper label[for='file-input'] span{
  margin-left: 10px
}

.wrapper i.remove{
  vertical-align:middle;
  margin-left: 5px;
  cursor:pointer;
  display:none;
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

<script>
  //jquery para desvanecer el mensage
  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});


//funcion de la tabla de boostrap tenga paginador y buscador
$(document).ready(function() {
    $('.table').DataTable({
       "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
       }
    });
  });
//boton file importar
$('document').ready(function(){

  var $file = $('#file-input'),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      $labelRemove = $('i.remove'),
      labelDefault = $labelText.text();

  // on file change
  $file.on('change', function(event){
    var fileName = $file.val().split( '.' ).pop();
    var fileExt= fileName.split('.').pop();
    fileExt  = fileExt.toLowerCase();

    switch (fileExt) {
			case 'xlsx':
			case 'xlsm':
			case 'xlsb':
			case 'xls': break;
			default:
				this.value = ''; // reset del valor
				fileName="";
      alert('El archivo no tiene la extensión adecuada');
		}

    if( fileName ){
      console.log($file)
      $labelText.text(fileName);
      $labelRemove.show();
      document.getElementById('ImpXls').disabled=false;
    }else{
      $labelText.text(labelDefault);
      $labelRemove.hide();
      document.getElementById('ImpXls').disabled=true;
    }
  });

  // Remove file
  $labelRemove.on('click', function(event){
    $file.val("");
    $labelText.text(labelDefault);
    $labelRemove.hide();
    console.log($file)
    document.getElementById('ImpXls').disabled=true;
  });
})

//cuadro de opciones

var id_dato=null;
    function pasar_id($id_tr) {

        id_dato=$id_tr;
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
