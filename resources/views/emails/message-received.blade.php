<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Usuario Creado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px;">

<div style="margin-right: 25%; margin-left: 25%; margin-top: 20px; margin-bottom:20px; border-radius: 10px; background-color: white;">

@if ($datos['empresa']=="Fersan")
    <img src="{{url(img/imgemail/EncaFM.png)}}" alt="fersan">
@endif

@if ($datos['empresa']=="Chaixtsu")
    <img src="{{url(img/imgemail/EncaCM.png)}}" alt="chaixtsu">
@endif

@if ($datos['empresa']=="Navarra")
    <img src="{{url(img/imgemail/EncaNM.png)}}" alt="navarra">
@endif

<div style="margin-bottom: 20px; text-align: center;">
    <h1>Bienvenido al Sistema de tickets</h1>
    <label>Hola {{$datos['name']}} Bienvenid@ al Sistema de levantamiento de incidencias y soporte tecnico del area de sistemas</label><br>
    <label for="">Este es tu correo: {{$datos['email']}} </label><br>
    <label for="">Esta es tu contrasñea: {{$datos['password']}} </label><br>
    <label for="">Para ingresar al sistemas coloca la informacion enviada y listo</label>
   <div style="margin-bottom: 20px; text-aling:center;">
    <form action="{{url('/')}}" method="get">
        <input type="submit" value="sistema" style="background-color:green;color:white; border-radius:25px; width:100px;height:30px;"/>
</form>

   </div>
</div>

@if ($datos['empresa']=="Fersan")
    <img src="{{url(img/imgemail/SupFM.png)}}" alt="fersan">
@endif

@if ($datos['empresa']=="Chaixtsu")
    <img src="{{url(img/imgemail/SupCM.png)}}" alt="chaixtsu">
@endif

@if ($datos['empresa']=="Navarra")
    <img src="{{url(img/imgemail/SupNM.png)}}" alt="navarra">
@endif

</div>


</body>
</html>
