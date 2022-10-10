<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Usuario Creado</title>
</head>
<body>

 <h1>Bienvenido al Sistema de tickets</h1>
 <label>Hola {{$datos['name']}} Bienvenid@ al Sistema de levantamiento de incidencias y soporte tecnico del area de sistemas</label><br>
 <label for="">Este es tu correo: {{$datos['email']}}</label><br>
 <label for="">Esta es tu contrasñea: {{$datos['password']}}</label><br>
 <label for="">Para ingresar al sistemas coloca la informacion enviada y listo</label>
<div style="margin-bottom: 20px; text-aling:center;">
    <a href="{{url('/')}}" style="border-radius:10px;">Sistema</a>
</div>

</body>
</html>
