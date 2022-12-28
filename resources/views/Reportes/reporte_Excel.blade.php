<html>
<head>
   <meta charset="utf-8">
</head>
<body>
   <div>
       <div>
          <table>
             <thead>
                <tr>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th></th>
                </tr>
             </thead>
             <tbody>
               @if($filtracion!="todos")
               <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center;" colspan="4">IT</td>
                   <td></td>
                </tr>
                <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center; " colspan="4">REPORTE DE TICKETS "{{$fechamin}}" AL "{{$fechamax}}" </td>
                   <td></td>
                </tr>
                <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center; " colspan="4">TIPO REPORTE "{{$filtracion}}" </td>
                   <td></td>
                </tr>
               @else
                <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center;" colspan="5">IT</td>
                   <td></td>
                </tr>
                <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center; " colspan="5">REPORTE DE TICKETS "{{$fechamin}}" AL "{{$fechamax}}" </td>
                   <td></td>
                </tr>
                <tr>
                   <td></td>
                   <td style="font-weight: bold; font-size: 20px; text-align: center; " colspan="5">TIPO REPORTE "{{$filtracion}}" </td>
                   <td></td>
                </tr>
               @endif
             </tbody>
          </table>
       </div>
       <div>
           <table class="table"  style="border-collapse: collapse; width: 100%; font-weight: bold; margin-top: 35px;   font-size: 10px;  text-align: center;">
              <thead >
                <tr>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 250px; font-size: 20px; border: 1px solid black;">Ticket ID</th>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 250px; font-size: 20px; border: 1px solid black;">Solicita</th>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 250px; font-size: 20px; border: 1px solid black;">Asignado</th>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 250px; font-size: 20px; border: 1px solid black;">Tipo</th>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 200px; font-size: 20px; border: 1px solid black;">Prioridad</th>
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 350px; font-size: 20px; border: 1px solid black;">Tema</th>
                  @if($filtracion=="todos")
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 200px; font-size: 20px; border: 1px solid black;">Status</th>
                  @endif
                  <th style="text-align: center; background-color: #17a2b8; font-weight: bold; width: 250px; font-size: 20px; border: 1px solid black;">Creacion</th>
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
                  <td style="text-align: center; font-size: 15px;">{{$reporte->tema}}</td>
                  @if($filtracion=="todos")
                  @if($reporte->status=="Abierto")
                  <td style="text-align: center; background-color: #AAD5A6; font-weight: bold; font-size: 18px;">{{$reporte->status}}</td>
                  @elseif($reporte->status=="Cerrado")
                  <td style="text-align: center; background-color: #D5A6A6; font-weight: bold; font-size: 18px;">{{$reporte->status}}</td>
                  @elseif($reporte->status=="Contestado")
                  <td style="text-align: center; background-color: #E3E3E3; font-weight: bold; font-size: 18px;">{{$reporte->status}}</td>
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
   </div>
</body>
</html>
