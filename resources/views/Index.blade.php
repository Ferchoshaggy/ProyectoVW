@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>
<div class="card">
    <div class="card-body">

<button type="button" class="accordion form-control" onclick="divD()">Filtrar por Fecha</button>
<div class="panel">
<form action="{{Route('vista_dash')}}" method="get">
@csrf
@method('POST')
    <div class="row">
        <div class="col-md-3">
        <label for="fmin">Fecha Minima:</label>
        <input type="date" class="form-control" name="fechaMin">
        </div>
        <div class="col-md-3">
        <label for="fmax">Fecha Maxima</label>
        <input type="date" class="form-control" name="fechaMax">
        </div>
        <div class="col-md-3">
        <button class="btn btn-success" style="margin-top: 30px">Buscar</button>
        </div>
    </div>
</form>
</div>
<br>

<?php $total_registros=0; ?>
@foreach ($tickets as $ticket)
<?php $total_registros++; ?>
@endforeach

<div class="row">
<div class="col-md-4" style="background-color:white;">
<div style="height:80%"><h1 class="num">{{$total_registros}}</h1></div>
<p style="text-align: center;height:20%">Total de registros</p>
</div>

    <div class="col-md-4">
        <div id="container" style="margin-right: 0px; margin-left: 0px;"></div>
    </div>

    <div class="col-md-4">
        <div id="container2" style="margin-right: 0px; margin-left: 0px;"></div>
    </div>
</div>

<br>
<div class="row">
        <div class="col-md-12" id="container3" style="margin-right: 0px; margin-left: 0px;"></div>
</div>

</div>
</div>
@stop

@section('footer')

<strong>
    Copyright © 2022-<?php echo date("Y");?> <a href="https://vw-fersan.com.mx/" target="_blank">Fersan Motors</a>
</strong>
@stop

@section('css')
<style>
    .num{
    text-align: center;position: relative;
    top: 50%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);

  color: #117bd5e8;
  font-weight: normal;
  font-size: 75px;
  font-family: "Cursive";
  text-transform: uppercase;
    }
/*Div desplegable */
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 8px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\1F4C5';
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\1F4C5";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.4s ease-in-out;
    opacity: 0;
}

div.panel.show {
    opacity: 1;
    max-height: 500px;
}
</style>

@stop

@section('js')

<!-- son para las graficas-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<?php

echo "<script type='text/javascript'>

Highcharts.chart('container2', {
                    colors: ['#01BAF2', '#71BF45', '#FAA74B', '#B37CD2'],
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Prioridad'
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    lang: {
                        downloadPNG:'Descargar en PNG',
                        downloadJPEG:'Descargar en JPEG',
                        downloadPDF:'Descargar en PDF',
                        downloadSVG:'Descargar en SVG',
                        printChart:'Imprimir Grafica',
                        exitFullscreen:'Salir de Pantalla Completa',
                        viewFullscreen:'Ver en Pantalla Completa'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {y} %'
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Porcentaje',
                        colorByPoint: true,
                        innerSize: '75%',
                        data: [";
$emergencia=0;
$alto=0;
$normal=0;
$bajo=0;
foreach($tickets as $ticket){
    if($ticket->prioridad=="Emergencia"){
 $emergencia++;
    }
if($ticket->prioridad=="Alto"){
    $alto++;
}
if($ticket->prioridad=="Normal"){
    $normal++;
}
if($ticket->prioridad=="Bajo"){
    $bajo++;
}
}
                     echo  "{
                            name: 'Emergencia',
                            color: '#FF0707',
                            y: $emergencia
                        },";
                        echo  "{
                            name: 'Alto',
                            color: '#F2C407',
                            y: $alto
                        },";
                        echo  "{
                            name: 'Normal',
                            color: '#ABF207',
                            y: $normal
                        },";
                        echo  "{
                            name: 'Bajo',
                            color: '#07D6F2',
                            y: $bajo
                        },";

     echo "]
                }]

            });
        ";

        echo "


        </script>";
?>
<?php

echo "<script type='text/javascript'>

Highcharts.chart('container', {
                    colors: ['#01BAF2', '#71BF45', '#FAA74B', '#B37CD2'],
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Tickets'
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    lang: {
                        downloadPNG:'Descargar en PNG',
                        downloadJPEG:'Descargar en JPEG',
                        downloadPDF:'Descargar en PDF',
                        downloadSVG:'Descargar en SVG',
                        printChart:'Imprimir Grafica',
                        exitFullscreen:'Salir de Pantalla Completa',
                        viewFullscreen:'Ver en Pantalla Completa'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {y} %'
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Porcentaje',
                        colorByPoint: true,
                        innerSize: '75%',
                        data: [";
$cerrados=0;
$abiertos=0;
$contestados=0;
foreach($tickets as $ticket){
    if($ticket->status=="Abierto"){
$abiertos++;
    }
if($ticket->status=="Cerrado"){
    $cerrados++;
}
if($ticket->status=="Contestado"){
    $contestados++;
}
}
                     echo  "{
                            name: 'Tickets Abiertos',
                            color: '#63AE00',
                            y: $abiertos
                        },";
                        echo  "{
                            name: 'Tickets Cerrados',
                            color: '#FA2E1A',
                            y: $cerrados
                        },";
                        echo  "{
                            name: 'Tickets Contestados',
                            color: '#F0F305',
                            y: $contestados
                        },";

     echo "]
                }]

            });
        ";

        echo "

        </script>";
?>

<?php

echo "<script type='text/javascript'>
const chart = Highcharts.chart('container3', {
    title: {
        text: 'Solictudes por Categoria'
    },
    xAxis: {
        categories: [
        'Apoyo Tecnico>Hardware>Escritorio/portatil',
        'Apoyo Tecnico>Hardware>Red y Telefonos',
        'Apoyo Tecnico>Hardware>Impresora',
        'Apoyo Tecnico>Software>Base de Datos',
        'Apoyo Tecnico>Software>Email',
        'Apoyo Tecnico>Software>Office Suite',
        'Apoyo Tecnico>Software>DMS',
        'Apoyo Tecnico>Software>Aplicaciones de Planta>Volkswagen',
        'Apoyo Tecnico>Software>Aplicaciones de Planta>SEAT',
        'Apoyo Tecnico>Software>Aplicaciones de Planta>Suzuki',
        'Apoyo Tecnico>Software>Otros>Revicion de Camaras',
        'Apoyo Tecnico>Software>Otros>Sistema Operativo',
        'Apoyo Tecnico>Software>Otros>Internet',
        'Apoyo Tecnico>Software>Otros>Otros',
        'Solicitar Equipo>Harware Nuevo>Escritorio/Portatil',
        'Solicitar Equipo>Harware Nuevo>Equipo de Red',
        'Solicitar Equipo>Nuevo Software',
        'Solicitar Equipo>Restablecimiento de Contraseña',
        'Solicitar Equipo>Solicitar Acceso',
        'Solicitar Equipo>Actualizar Software']
    },
         series: [{
        type: 'column',
        name: 'Total',
        colorByPoint: true,
        data:";

$ahe=0;
$ahrt=0;
$ahi=0;
$asbd=0;
$ase=0;
$asos=0;
$asd=0;
$asapv=0;
$asaps=0;
$asadps=0;
$asorc=0;
$asosop=0;
$asoint=0;
$asootr=0;
$shnep=0;
$shne=0;
$sns=0;
$src=0;
$ssa=0;
$sas=0;
foreach($tickets as $ticket){

//if finales

    if($ticket->opcion3=="Escritorio Portatil"){
$ahe++;
    }else if($ticket->opcion3=="Red y Telefonos"){
$ahrt++;
    }else if($ticket->opcion3=="Impresora"){
$ahi++;
    }else if($ticket->opcion3=="Base de Datos"){
$asbd++;
    }else if($ticket->opcion3=="Email"){
$ase++;
    }else if($ticket->opcion3=="Office Suite"){
$asos++;
    }else if($ticket->opcion3=="DMS"){
$asd++;
    }else if($ticket->opcion4=="Volkswagen"){
$asapv++;
    }else if($ticket->opcion4=="SEAT"){
$asaps++;
    }else if($ticket->opcion4=="Suzuki"){
$asadps++;
    }else if($ticket->opcion4=="Camaras"){
$asorc++;
    }else if($ticket->opcion4=="Sistema Operativo"){
$asosop++;
    }else if($ticket->opcion4=="Internet"){
$asoint++;
    }else if($ticket->opcion4=="Otros"){
$asootr++;
    }else if($ticket->opcion3=="Escritorio/Portatil"){
$shnep++;
    }else if($ticket->opcion3=="Equipo de Red"){
$shne++;
    }else if($ticket->opcion2=="Nuevo Software"){
$sns++;
    }else if($ticket->opcion2=="Restablecimiento Contraseña"){
$src++;
    }else if($ticket->opcion2=="Solicitar Acceso"){
$ssa++;
    }else if($ticket->opcion2=="Actualizar Software"){
$sas++;
    }

 }
    echo" [$ahe, $ahrt, $ahi, $asbd, $ase, $asos, $asd, $asapv,$asaps, $asadps, $asorc,$asosop,$asoint,$asootr,$shnep, $shne,$sns,$src,$ssa,$sas],";

    echo"  showInLegend: false

    }]
});

</script>";
?>

<script>
    function divD(){
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
}
</script>

@stop
