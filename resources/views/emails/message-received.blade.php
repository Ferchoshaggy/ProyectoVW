<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Usuario</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px;width: 100%">

    <div style="margin-right: 15%; margin-left: 15%; margin-top: 10px; margin-bottom:10px; border-radius: 10px; background-color: white;">

 <img
 @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/EncaFM.png')}}" @endif
 @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/EncaCM.png')}}" @endif
 @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/EncaNM.png')}}" @endif
style="width: 100%; height: auto; border-radius: 15px;">

<div style="margin-top: 100px;margin-bottom: 100px; text-align: center;font-size: 20px">
    <h1>Bienvenido al Sistema de tickets</h1>
    <label>Hola {{$datos['name']}} Bienvenid@ al Sistema de levantamiento de incidencias y soporte tecnico del area de sistemas</label><br>
    <label for="">Este es tu correo: {{$datos['email']}} </label><br>
    <label for="">Esta es tu contraseña: {{$datos['password']}} </label><br>
    <label for="">Para ingresar al sistemas coloca la informacion enviada</label><br>
<a href="{{url('/')}}" style="background-color:green;color:white; border-radius:20px; width:80%;height:30px;">link del Sistema</a>
        </div>

        <img
        @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/SupFM.png')}}" @endif
        @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/SupCM.png')}}" @endif
        @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/SupNM.png')}}" @endif
       style="width: 100%; height: auto; border-radius: 15px;">

        </div>

</body>
</html>

