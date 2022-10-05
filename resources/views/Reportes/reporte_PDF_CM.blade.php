<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte CM</title>
</head>

<style>

</style>
<body>
  <header>
    <table class="table"  style="border-collapse: collapse; width: 100%; font-weight: bold; margin-top: 35px;   font-size: 10px;  text-align: center;">
        <thead >
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
            @foreach ($tickets as $reporte)
            @foreach ($users as $user )
            @if ($reporte->usuario==$user->id)
          <tr class="marca" onclick="pasar_id({{$reporte->id}});">
            <td style="text-align: center;">{{$reporte->codigo}}</td>
            <td style="text-align: center;">{{$user->name}} {{$user->ape_pat}}</td>
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

  </header>

</body>
</html>
