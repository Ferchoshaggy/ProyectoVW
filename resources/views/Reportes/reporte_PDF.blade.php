<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte {{$diseno}}</title>
</head>

<style>
tbody tr:nth-child(odd) {

background-color:#4e4e4e3f;

}

  *{
      margin: 0;
      padding: 0;
      font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,'Open Sans','Helvetica Neue',sans-serif;

    }
@if($diseno=="Fersan")
  body{
        font-size: 15px;
        background-color: red;
        padding-top: 120px;
        padding-bottom: 75px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/f-r-2.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@elseif($diseno=="Chaixtsu")
  body{
    font-size: 15px;
        background-color: red;
        padding-top: 120px;
        padding-bottom: 75px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/e-r-2.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@elseif($diseno=="Navarra")
  body{
    font-size: 15px;
        background-color: red;
        padding-top: 120px;
        padding-bottom: 75px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/n-r-2.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@endif

</style>
<body >
  <header>

    <div style="margin-top: 0px;">
      <div style="float: left; font-size: 20px; font-weight: bold; width: 50%;  padding: 50px;">IT</div>
      <div style="float: right; font-size: 15px; font-weight: bold; width: 50%; text-align: right; padding: 50px;">
        REPORTE DE TICKETS "{{$fechamin}}" AL "{{$fechamax}}" <br>
        TIPO REPORTE "{{$filtracion}}"
      </div>
    </div>
    <br><br>

    <div style="">
      <table class="table" style=" width: 100%; margin-top: 50px; border: black 3px solid;" cellspacing="0" cellpadding="0">
          <thead >
            <tr>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid; padding: 10px;">Ticket ID</th>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Solicita</th>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Asignado</th>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Tipo</th>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Prioridad</th>
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid; ">Tema</th>
              @if($filtracion=="todos")
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Status</th>
              @endif
              <th style="text-align: center; font-size: 15px; font-weight: bold; border: black 3px solid;">Creacion</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($tickets as $reporte)
              @foreach ($users as $user )
              @if ($reporte->usuario==$user->id)
            <tr class="marca" onclick="pasar_id({{$reporte->id}});">
              <td style="text-align: center; font-size: 15px;">{{$reporte->codigo}}</td>
              <td style="text-align: center; font-size: 15px;">{{$user->name}}</td>
              <td style="text-align: center; font-size: 15px;">{{$reporte->fuente}}</td>
              <td style="text-align: center; font-size: 15px;">{{$reporte->tipo}}</td>
              <td style="text-align: center; font-size: 15px;">{{$reporte->prioridad}}</td>
              <td style="text-align: center; font-size: 15px;  width: 100px;">
                <div style="word-wrap: break-word; width: 230px;">{{$reporte->tema}}</div>
              </td>
              @if($filtracion=="todos")
              @if($reporte->status=="Abierto")
              <td style="text-align: center; background-color: #AAD5A6; font-weight: bold; font-size: 15px;">{{$reporte->status}}</td>
              @elseif($reporte->status=="Cerrado")
              <td style="text-align: center; background-color: #D5A6A6; font-weight: bold; font-size: 15px;">{{$reporte->status}}</td>
              @elseif($reporte->status=="Contestado")
              <td style="text-align: center; background-color: #E3E3E3; font-weight: bold; font-size: 15px;">{{$reporte->status}}</td>
              @endif
              @endif
              <td style="text-align: center; font-size: 15px;">{{$reporte->created_at}}</td>
            </tr>
            @endif
            @endforeach
            @endforeach
          </tbody>
      </table>
    </div>

<!--
    <div style="background-color: red;">
      @for($i=0; $i<=300; $i++)
      asdas<br>
      @endfor
    </div>
-->
  </header>

</body>
</html>
