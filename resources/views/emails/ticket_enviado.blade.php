<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Enviado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px; width: 100%">

    <div style="margin-right: 15%; margin-left: 15%; margin-top: 10px; margin-bottom:10px; border-radius: 10px; background-color: white;">

        <div style="margin-top: 100px;margin-bottom: 100px;text-align: center;font-size: 25px">

<label for="">Estimad@ {{$datos['name']}} su ticket Fue levantado con Exito y se asigno con el codigo {{$datos['codigo']}}</label><br>
<label for="">Y un personal del departamento de sistemas Fersan le dara seguimiento y solucion</label><br>
<label for="">Su incidencia: {{$datos['tema']}}</label><br>

            </div>

    </div>


</body>
</html>
