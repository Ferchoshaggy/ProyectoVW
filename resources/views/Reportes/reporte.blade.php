@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">


@section('content')
<br>

<div class="card">
    <div class="card-body">

        <div class="container overflow-hidden">
            <div class="row g-2">
              <div class="col">
               <div class="p-3 border bg-light"><button type="button" class="btn btn-light">Light</button></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light"><button type="button" class="btn btn-light">Light</button></div>
              </div>
            <div class="col">
                <div class="p-3 border bg-light"><button type="button" class="btn btn-light">Light</button></div>
              </div>
            </div>
          </div>

    </div>
</div>


@stop

@section('css')

<style>

</style>

@stop

@section('js')

<script>


</script>


@stop
