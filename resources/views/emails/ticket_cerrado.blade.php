<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ticket Cerrado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px; width: 100%">
    <div style="margin-right: 15%; margin-left: 15%; margin-top: 10px; margin-bottom:10px; border-radius: 10px; background-color: white;">

        <div style="margin-top: 100px;margin-bottom: 100px;text-align: center;font-size: 25px">
        <label for="">Estimad@ {{$datos['name']}} su ticket con el codigo: {{$datos['codigo']}} ha sido cerrado</label><br>
        <label for="">El dia {{$datos['fechaF']}}</label><br><br>
        <label for="">Su incidencia: {{$datos['tema']}}</label><br>
        <label for="">Describiendo: {{$datos['descripcion']}}</label><br><br>
        <label for="">La solucion Fue:</label><br>
        {{$datos['solucion']}}
        </div>

    </div>
</body>
</html>
