@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

@section('content')
<br>
<div class="card">
    <div class="card-body">

    </div>
</div>


<div class="row">
<div class="col-lg-4 col-md-6" style="background-color:white;">
<div style="height:80%"><h1 class="num">15</h1></div>
<p style="text-align: center;height:20%">Total de registros</p>
</div>

    <div class="col-lg-4 col-md-6">
        <div id="container" style="margin-right: 0px; margin-left: 0px;"></div>
    </div>

</div>




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
</style>


@stop

@section('js')

<!-- son para las graficas-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type='text/javascript'>

Highcharts.chart('container', {
                    colors: ['#01BAF2', '#71BF45', '#FAA74B', '#B37CD2'],
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: '<p class="texto_grande">Tickets</p>'
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    lang: {
                        downloadPNG:"Descargar en PNG",
                        downloadJPEG:"Descargar en JPEG",
                        downloadPDF:"Descargar en PDF",
                        downloadSVG:"Descargar en SVG",
                        printChart:"Imprimir Grafica",
                        exitFullscreen:"Salir de Pantalla Completa",
                        viewFullscreen:"Ver en Pantalla Completa"
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
                        name: 'Percentage',
                        colorByPoint: false,
                        innerSize: '75%',
                        data: [{
                            name: 'Tickets Abiertos',
                            color: '#FF9300',
                            y: 10
                        }, {
                            name: 'Tickets Cerrados',
                            color: '#63AE00',
                            y: 25
                        }, {
                            name: 'Tickets Respondidos',
                            color: '#00A7C6',
                            y: 15
                        }]
                    }]
                });

</script>


@stop
