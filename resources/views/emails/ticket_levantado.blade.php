<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Levantado</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px; width: 100%">

   <div style="margin-top: 100px;margin-bottom: 100px; text-align: center;font-size:25px">
 <h4>Han levantado un ticket</h4>
 El usuario {{$datos['name']}} Ha levantado un ticket el dia {{$datos['fecha']}}<br>
 <label for="">Su incidencia es: {{$datos['tema']}}</label>
   </div>


</body>
</html>
