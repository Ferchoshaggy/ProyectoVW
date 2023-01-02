<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Usuario</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px;width: 100%">

<div style="margin-top: 100px;margin-bottom: 100px; text-align: center;font-size: 20px">
    <h1>Bienvenido al Sistema de tickets</h1>
    <label>Hola {{$datos['name']}} Bienvenid@ al Sistema de levantamiento de incidencias y soporte tecnico del area de sistemas</label><br>
    <label for="">Este es tu correo: {{$datos['email']}} </label><br>
    <label for="">Esta es tu contraseña: {{$datos['password']}} </label><br>
    <label for="">Para ingresar al sistemas coloca la informacion enviada</label><br>
    <a href="{{url('/')}}" style="border:green 3px solid;color:black; border-radius:20px;padding:10px;text-decoration:none;font-size:20px">link del Sistema</a>
        </div>

</body>
</html>

