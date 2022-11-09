<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$diseno}}</title>
</head>
<body>
<style>
  *{
      margin: 0;
      padding: 0;
      font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,'Open Sans','Helvetica Neue',sans-serif;
    }

    .tit{
        background-color:  rgba(73, 73, 73, 0.205);
    }
    @if($diseno=="Fersan")
  body{
        font-size: 45px;
        background-color: red;
        width: 2550px;
        height: 3300px;
        padding-top: 350px;
        padding-bottom: 215px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO13.png);
        background-repeat: no-repeat;
    }
@elseif($diseno=="Chaixtsu")
  body{
        font-size: 45px;
        background-color: red;
        width: 2550px;
        height: 3300px;
        padding-top: 350px;
        padding-bottom: 215px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO12.png);
        background-repeat: no-repeat;
    }
@elseif($diseno=="Navarra")
  body{
        font-size: 45px;
        background-color: red;
        width: 2550px;
        height: 3300px;
        padding-top: 350px;
        padding-bottom: 215px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO11.png);
        background-repeat: no-repeat;
    }
@endif
</style>




<div style="margin-top:130px;">
    <div style="float: right; font-size: 35px; font-weight: bold; width: 50%; text-align:right; padding: 50px;">{{$fecha}}<br>
      Fecha de Elaboracion<br>
    </div>
  </div>
  <br>

<div style="margin: 100px;">
    <table border="1" style="width: 100%; margin-top: 150px; border: black 3px solid;" cellspacing="0" cellpadding="0">

        <tr>
            <td class="tit" colspan="4" style="width: auto;text-align: center;">Nombre</td>
            <td class="tit" colspan="4" style="width: auto;text-align: center;">Puesto</td>
        </tr>
        <tr>
            <td colspan="4" style="width: auto;text-align: center;">nombre nombre apellido apellido</td>
            <td rowspan="2" colspan="4" style="width: auto;text-align: center;">encargado de refacciones</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Departamento</td>
            <td colspan="2" style="width: auto; text-align: center;">refacciones</td>
        </tr>
        <tr>
            <td class="tit" colspan="8" style="width: auto; text-align: center;">Correo Electronico</td>
        </tr>
        <tr>
            <td colspan="8" style="width: auto; text-align: center;">nombre.apellido@empresa-ixtapaluca.com.mx</td>
        </tr>
        <tr>
            <td class="tit" colspan="8" style="width: auto;">Caracteristicas del Equipo</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Equipo</td>
            <td class="tit" colspan="2" style="width: auto;">Serie</td>
            <td class="tit" colspan="2" style="width: auto;">Marca</td>
            <td class="tit" colspan="2" style="width: auto;">Modelo</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">CPU</td>
            <td colspan="2" style="width: auto; text-align: center;">4CE7789HNBD</td>
            <td colspan="2" style="width: auto; text-align: center;">HP</td>
            <td colspan="2" style="width: auto; text-align: center;">HP 250 G4</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Monitor</td>
            <td colspan="2" style="width: auto; text-align: center;">N/A</td>
            <td colspan="2" style="width: auto; text-align: center;">GHIA</td>
            <td colspan="2" style="width: auto; text-align: center;">SO228G</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Teclado</td>
            <td colspan="2" style="width: auto; text-align: center;">4CE7789HNBD</td>
            <td colspan="2" style="width: auto; text-align: center;">HP</td>
            <td colspan="2" style="width: auto; text-align: center;">HP 250 G4</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Raton</td>
            <td colspan="2" style="width: auto; text-align: center;">4CE7789HNBD</td>
            <td colspan="2" style="width: auto; text-align: center;">HP</td>
            <td colspan="2" style="width: auto; text-align: center;">HP 250 G4</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Impresora</td>
            <td colspan="6" style="width: auto; text-align: center;">4CE7789HNBD</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">no-break o regulador</td>
            <td colspan="6" style="width: auto; text-align: center;">4CE7789HNBD</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">computadora escritorio laptop</td>
            <td colspan="6" style="width: auto; text-align: center;">4CE7789HNBD</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Procesador</td>
            <td class="tit" style="width: auto; text-align: center;">Intel core i5</td>
            <td class="tit" style="width: auto; text-align: center;">3.20ghz</td>
            <td class="tit" style="width: auto; text-align: center;">Mem_ram</td>
            <td class="tit" style="width: auto; text-align: center;">4 GB</td>
            <td class="tit" style="width: auto; text-align: center;">H.D</td>
            <td class="tit" style="width: auto; text-align: center;">1 TERA</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Programas</td>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Sistema Operativo</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Windows 10</td>
            <td colspan="2" style="width: auto; text-align: center;">IP</td>
            <td colspan="2" style="width: auto; text-align: center;">192.100.100.0</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">VNC</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Usuario</td>
            <td colspan="2" style="width: auto; text-align: center;">alguien 2</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">Acrobat</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Contraeña</td>
            <td colspan="2" style="width: auto; text-align: center;">N/A</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">GDS</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Telefono</td>
            <td colspan="2" style="width: auto; text-align: center;">Avayaj128</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">Windows defender</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">version de oficce</td>
            <td colspan="2" style="width: auto; text-align: center;">microsoft office profesional plus 2016</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Factura</td>
            <td colspan="2" style="width: auto; text-align: center;">Propia</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Observaciones</td>
            <td class="tit" colspan="6" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
     <th colspan="8" style="width: auto;font-size:18px">Me comprometo a cuidar la integridad y buen estado del equipo y accesorios recibidos,
         clave de telefono, claves de portales, los cuales son propiedad de CHAIXTSU MOTORS,S.A.DE C.V y manifiesto
          mi conformidad para utilizarlos en beneficio de la empresa, Asimismo los programas instalados al recivir el equipo
         son los definidos por los estandares corporativos, por lo que me comprometo a no instalr otros,en caso de requiera software diferente
         al corporativo para realizar mis funciones</th>
        </tr>
        <tr>
            <th colspan="8" style="width: auto; text-align: center;">FIRMA DE CONFORMIDAD DEL USUARIO<br><br><br><br><hr width="55%" color="black" style="margin:0px 25% 20px"></th>
        </tr>
    </table>
</div>

</body>
</html>
