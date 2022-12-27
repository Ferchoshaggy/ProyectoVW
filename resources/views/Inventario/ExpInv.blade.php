    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Excel Inventario</title>
    </head>
    <body>
        <table class="table">
            <thead>
    <tr>
        <th style="text-align: center;background-color: blue;color:yellow;width: 200px;">Nombre de usuario</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Puesto</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Departamento</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Marca</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">No de serie</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Procesador</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Ghz</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Disco</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Mem Ram</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Sistema Operativo</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Monitor</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Marca Monitor</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Modelo Monitor</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 180px;">Adicional</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 180px;">Nomenclatura</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 250px;">I-Portal</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 250px;">Correo de Planta</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 250px;">Correo Institucional</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 200px;">Portal de Distribuidores</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">GEKO</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Clave Telefonica</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">IP</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">SIF</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">POC</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">NADCOM</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">SAGA</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 200px;">Modelo de Impresora</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Fecha compra</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Factura</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 100px;">Garantia</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Grupo Fortinet</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">CPU o laptop</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Usuario de red</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Programas Instalados</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">VNC</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Adobe</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">GDS</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Antivirus</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Office</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Mantenimiento</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Usuario de GDS</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Regulador</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Marca Modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Teclado serie</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Teclado Marca</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Teclado modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Raton serie</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Raton marca</th>
        <th style="text-align: center;background-color: blue;color:yellow;width: 150px;">Raton modelo</th>
    </tr>
            </thead>

            <tbody>
        @foreach($inventorys as $dato)
    <tr>
        <td style="text-align: center;">{{$dato->Nombre_de_Usuario}}</td>
        <td style="text-align: center;">{{$dato->Puesto}}</td>
        <td style="text-align: center;">{{$dato->Departamento}}</td>
        <td style="text-align: center;">{{$dato->Marca}}</td>
        <td style="text-align: center;">{{$dato->Modelo}}</td>
        <td style="text-align: center;">{{$dato->No_de_Serie}}</td>
        <td style="text-align: center;">{{$dato->Procesador}}</td>
        <td style="text-align: center;">{{$dato->Ghz}}</td>
        <td style="text-align: center;">{{$dato->Disco}}</td>
        <td style="text-align: center;">{{$dato->Mem_Ram}}</td>
        <td style="text-align: center;">{{$dato->Sistema_Operativo}}</td>
        <td style="text-align: center;">{{$dato->Monitor}}</td>
        <td style="text-align: center;">{{$dato->Marca_Monitor}}</td>
        <td style="text-align: center;">{{$dato->Modelo_Monitor}}</td>
        <td style="text-align: center;">{{$dato->ADICIONAL}}</td>
        <td style="text-align: center;">{{$dato->Nomenclatura}}</td>
        <td style="text-align: center;">{{$dato->I_Portal}}</td>
        <td style="text-align: center;">{{$dato->Correo_de_Planta}}</td>
        <td style="text-align: center;">{{$dato->Correo_Institucional}}</td>
        <td style="text-align: center;">{{$dato->Portal_de_Distribuidores}}</td>
        <td style="text-align: center;">{{$dato->GEKO}}</td>
        <td style="text-align: center;">{{$dato->Clave_Telefonica}}</td>
        <td style="text-align: center;">{{$dato->IP}}</td>
        <td style="text-align: center;">{{$dato->SIF}}</td>
        <td style="text-align: center;">{{$dato->POC}}</td>
        <td style="text-align: center;">{{$dato->NADCON}}</td>
        <td style="text-align: center;">{{$dato->SAGA}}</td>
        <td style="text-align: center;">{{$dato->Modelo_de_impresora}}</td>
        <td style="text-align: center;">{{$dato->FECHA_COMPRA}}</td>
        <td style="text-align: center;">{{$dato->FACTURA}}</td>
        <td style="text-align: center;">{{$dato->GARANTIA}}</td>
        <td style="text-align: center;">{{$dato->GRUPO_FORTINET}}</td>
        <td style="text-align: center;">{{$dato->CPU_O_LAPTOP}}</td>
        <td style="text-align: center;">{{$dato->USUARIO_DE_RED}}</td>
        <td style="text-align: center;">{{$dato->Programas_Instalados}}</td>
        <td style="text-align: center;">{{$dato->VNC}}</td>
        <td style="text-align: center;">{{$dato->Adobe}}</td>
        <td style="text-align: center;">{{$dato->GDS}}</td>
        <td style="text-align: center;">{{$dato->Antivirus}}</td>
        <td style="text-align: center;">{{$dato->OFFICE}}</td>
        <td style="text-align: center;">{{$dato->MANTENIMIENTO}}</td>
        <td style="text-align: center;">{{$dato->USUARIO_DE_GDS}}</td>
        <td style="text-align: center;">{{$dato->REGULADOR}}</td>
        <td style="text-align: center;">{{$dato->MARCA_MODELO}}</td>
        <td style="text-align: center;">{{$dato->teclado_serie}}</td>
        <td style="text-align: center;">{{$dato->teclado_marca}}</td>
        <td style="text-align: center;">{{$dato->teclado_modelo}}</td>
        <td style="text-align: center;">{{$dato->raton_serie}}</td>
        <td style="text-align: center;">{{$dato->raton_marca}}</td>
        <td style="text-align: center;">{{$dato->raton_modelo}}</td>
    </tr>
    @endforeach
            </tbody>
        </table>
    </body>
    </html>
