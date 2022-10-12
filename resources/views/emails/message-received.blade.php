<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Usuario Creado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px;">

<div style="position: relative; display: inline-block; text-align: center;">

    <img src="{{url('formatos/e-r.png')}}" style="display:block;margin-left: auto; margin-right: auto;">

<div style=" position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
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


</div>


</body>
</html>
