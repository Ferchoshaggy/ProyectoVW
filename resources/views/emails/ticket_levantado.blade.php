<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Levantado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px;">

    <div style="margin-right: 15%; margin-left: 15%; margin-top: 10px; margin-bottom:10px; border-radius: 10px; background-color: white;">

    <img
    @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/EncaFM.png')}}" @endif
    @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/EncaCM.png')}}" @endif
    @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/EncaNM.png')}}" @endif
   style="width: 100%; height: auto; border-radius: 15px;">

   <div style="margin-top: 100px;margin-bottom: 100px; text-align: center;font-size:25px">
 <h4>Alguien a levantado un ticket</h4>
 El usuario {{$datos['name']}} Ha levantado un ticket el dia {{$datos['fecha']}}<br>
   </div>

   <img
   @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/SupFM.png')}}" @endif
   @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/SupCM.png')}}" @endif
   @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/SupNM.png')}}" @endif
  style="width: 100%; height: auto; border-radius: 15px;">

    </div>
</body>
</html>
