<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contraseña Cambiada</title>
</head>
<body style="background-color: #E8E7E2; padding-top: 10px; padding-bottom: 10px; width: 100%">

    <div style="margin-right: 15%; margin-left: 15%; margin-top: 10px; margin-bottom:10px; border-radius: 10px; background-color: white;">

        <img
        @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/EncaFM.png')}}" @endif
        @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/EncaCM.png')}}" @endif
        @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/EncaNM.png')}}" @endif
       style="width: 100%; height: auto; border-radius: 15px;">

       <div style="margin-top: 100px;margin-bottom: 100px; text-align: center;font-size: 20px">
           <label>Hola {{$datos['name']}} Su Contraseña Ha Sido cambiada por el Departamento de sistemas de Grupo Fersan</label><br>
           <label for="">Esta es tu contraseña Nueva: {{$datos['password']}} </label><br>
           <label for="">Para ingresar al sistemas coloca la Nueva contraseña enviada</label><br>
           <a href="{{url('/')}}" style="background-color:green;color:white; border-radius:20px; width:100%;height:35px;padding:10px;text-decoration:none;">link del Sistema</a>
               </div>

               <img
               @if($datos['empresa']=="Fersan") src="{{url('img/imgemail/SupFM.png')}}" @endif
               @if($datos['empresa']=="Chaixtsu") src="{{url('img/imgemail/SupCM.png')}}" @endif
               @if($datos['empresa']=="Navarra") src="{{url('img/imgemail/SupNM.png')}}" @endif
              style="width: 100%; height: auto; border-radius: 15px;">

               </div>

</body>
</html>
