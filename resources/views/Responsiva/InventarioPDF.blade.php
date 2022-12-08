<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$diseno}}</title>
    <link rel="icon" type="image/jpg" href="{{url('favicon.ico')}}"/>
</head>
<body>
<style>
  *{
      margin: 0;
      padding: 0;
    }

    .tit{
        background-color:  rgba(73, 73, 73, 0.205);
    }
    @if($diseno=="Fersan")
  body{
        font-size: 15px;
        background-color: red;
        padding-top: 70px;
        padding-bottom: 5px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO13.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@elseif($diseno=="Chaixtsu")
  body{
    font-size: 15px;
        background-color: red;
        padding-top: 70px;
        padding-bottom: 5px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO12.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@elseif($diseno=="Navarra")
  body{
    font-size: 15px;
        background-color: red;
        padding-top: 70px;
        padding-bottom: 5px;
        padding-right:25px;
        padding-left:25px;
        margin: 0;
        background-color: rgb(255, 255, 255);
        background-image: url(./formatos/responsiva/FORMATO11.png);
        background-size:cover;
        background-repeat: no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
@endif
</style>


<div style="margin-top:30px;">
    <div style="float: right; font-size: 15px; font-weight: bold; width: 50%; text-align:right; padding: 50px;">{{$fecha}}<br>
      Fecha de Elaboracion<br>
    </div>
  </div>
  <br>

<div style="margin: 20px;">
    <table border="1" style="width: 100%; margin-top: 85px; border: black 3px solid;" cellspacing="0" cellpadding="0">

        <tr>
            <td class="tit" colspan="4" style="width: auto;text-align: center;">Nombre</td>
            <td class="tit" colspan="4" style="width: auto;text-align: center;">Puesto</td>
        </tr>
        <tr>
            <td colspan="4" style="width: auto;text-align: center;">{{$inventario->Nombre_de_Usuario}}</td>
            <td rowspan="2" colspan="4" style="width: auto;text-align: center;">{{$inventario->Puesto}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Departamento</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Departamento}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="8" style="width: auto; text-align: center;">Correo Electronico</td>
        </tr>
        <tr>
            <td colspan="8" style="width: auto; text-align: center;">{{$inventario->Correo_Institucional}}</td>
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
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->No_de_Serie}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Marca}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Modelo}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Monitor</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Monitor}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Marca_Monitor}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Modelo_Monitor}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Teclado</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->teclado_serie}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->teclado_marca}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->teclado_modelo}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Raton</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->raton_serie}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->raton_marca}}</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->raton_modelo}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Impresora</td>
            <td colspan="6" style="width: auto; text-align: center;">{{$inventario->Modelo_de_impresora}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">No-break o Regulador</td>
            <td colspan="6" style="width: auto; text-align: center;">{{$inventario->MARCA_MODELO}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto;">Computadora Escritorio o Laptop</td>
            <td colspan="6" style="width: auto; text-align: center;">{{$inventario->CPU_O_LAPTOP}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Procesador</td>
            <td class="tit" style="width: auto; text-align: center;">{{$inventario->Procesador}}</td>
            <td class="tit" style="width: auto; text-align: center;">{{$inventario->Ghz}}</td>
            <td class="tit" style="width: auto; text-align: center;">Mem Ram</td>
            <td class="tit" style="width: auto; text-align: center;">{{$inventario->Mem_Ram}}</td>
            <td class="tit" style="width: auto; text-align: center;">H.D/SSD</td>
            <td class="tit" style="width: auto; text-align: center;">{{$inventario->Disco}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Programas</td>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Sistema Operativo</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Sistema_Operativo}}</td>
            <td colspan="2" style="width: auto; text-align: center;">IP</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->IP}}</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->VNC}}</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Usuario GDS</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->USUARIO_DE_GDS}}</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Adobe}}</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->GDS}}</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Telefono</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Clave_Telefonica}}</td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->Antivirus}}</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;">version de office</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->OFFICE}}</td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;"></td>
            <td colspan="2" style="width: auto; text-align: center;">Factura</td>
            <td colspan="2" style="width: auto; text-align: center;">{{$inventario->FACTURA}}</td>
        </tr>
        <tr>
            <td class="tit" colspan="2" style="width: auto; text-align: center;">Observaciones</td>
            <td class="tit" colspan="6" style="width: auto; text-align: center;">{{$inventario->ADICIONAL}}</td>
        </tr>
        <tr>
     <th colspan="8" style="width: auto;font-size:8px">Me comprometo a cuidar la integridad y buen estado del
         equipo y accesorios recibidos, clave de teléfono, claves de portales, los cuales son propiedad de
         @if($diseno=="Fersan")<b>FERSAN MOTORS,S.A DE C.V</b>,@elseif($diseno=="Chaixtsu")<b>CHAIXTSU MOTORS,S.A DE C.V</b>,@elseif($diseno=="Navarra")<b>NAVARRA MOTORS,S.A DE C.V</b>, @endif manifiesto mi conformidad para utilizarlos en beneficio de la empresa.
        Asimismo, los programas instalados al recibir el equipo son los definidos por los estándares corporativos,
        por lo que me comprometo a no instalar otros, en caso de que requiera software diferente al corporativo
        para realizar mis funciones la instalación del mismo es responsabilidad del área de sistemas,
        garantizando que existan las licencias correspondientes. Me comprometo a utilizar para mis labores las
        carpetas designadas para el usuario, a no almacenar, copiar, distribuir archivos, correos electrónicos o
        programas que no estén relacionados con mis actividades en @if($diseno=="Fersan")<b>FERSAN MOTORS,S.A DE C.V</b>,@elseif($diseno=="Chaixtsu")<b>CHAIXTSU MOTORS,S.A DE C.V</b>,@elseif($diseno=="Navarra")<b>NAVARRA MOTORS,S.A DE C.V</b>, @endif a no modificar iconos,
        tapiz, protector de pantalla, y demás configuraciones originales del equipo. Estoy enterado que soporte
        técnico efectuara auditorias periódicas a mi equipo de cómputo y, en caso de que encuentre software
        diferente al corporativo sin licencias, genera un reporte de sanción a partir del cual Recursos Humanos
        tomara las acciones correspondientes. Acepto que toda la información almacenada en el equipo pertenece a
        @if($diseno=="Fersan")<b> FERSAN MOTORS,S.A DE C.V</b>,@elseif($diseno=="Chaixtsu")<b>CHAIXTSU MOTORS,S.A DE C.V</b>,@elseif($diseno=="Navarra")<b>NAVARRA MOTORS,S.A DE C.V</b>, @endif y podrá serme requerida en cualquier momento. Estoy consciente de que los
        respaldos y confidencialidad de la información mencionada son responsabilidad mía, así como el uso que le
        proporcione al equipo y en caso de descompostura, daño o robo, deberé dar aviso inmediatamente a los
        departamentos de sistemas y seguridad (este último en caso de robo o daño provocado por terceros) con el fin
        de que ningún costo me sea cobrado. Me comprometo a notificar al área de sistemas cuando el equipo deba ser
        reubicado o reasignado, para que en este último caso me sea entregada la carta de liberación del equipo
        contra la entrega del mismo y sus accesorios en el estado en que los recibí
        (considerando el desgaste normal del equipo). Estoy de acuerdo en que, si el equipo a mi cargo lo entrego
        dañado o incompleto y, en su momento, no lo reporte a las áreas correspondientes, o bien, es por mal uso de
        mi parte (ruptura o extravió de accesorios) se me haga el cobro correspondiente. </th>
        </tr>
        <tr>
            <th colspan="8" style="width: auto; text-align: center;">FIRMA DE CONFORMIDAD DEL USUARIO<br><br><br><br><hr width="55%" color="black" style="margin:0px 25% 20px"></th>
        </tr>
    </table>
</div>

</body>
</html>
