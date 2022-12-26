    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <table class="table">
            <thead>
    <tr>
        <th style="text-align: center;background-color: blue;color:yellow">Nombre</th>
        <th style="text-align: center;background-color: blue;color:yellow">Puesto</th>
        <th style="text-align: center;background-color: blue;color:yellow">Departamento</th>
        <th style="text-align: center;background-color: blue;color:yellow">Marca</th>
        <th style="text-align: center;background-color: blue;color:yellow">Modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow">No.de serie</th>
        <th style="text-align: center;background-color: blue;color:yellow">Procesador</th>
        <th style="text-align: center;background-color: blue;color:yellow">Ghz</th>
        <th style="text-align: center;background-color: blue;color:yellow">Disco</th>
        <th style="text-align: center;background-color: blue;color:yellow">Mem Ram</th>
        <th style="text-align: center;background-color: blue;color:yellow;width:100%">Sistema Operativo</th>
        <th style="text-align: center;background-color: blue;color:yellow">Monitor</th>
        <th style="text-align: center;background-color: blue;color:yellow">Marca</th>
        <th style="text-align: center;background-color: blue;color:yellow">Modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow">Teclado serie</th>
        <th style="text-align: center;background-color: blue;color:yellow">Teclado Marca</th>
        <th style="text-align: center;background-color: blue;color:yellow">Teclado modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow">raton serie</th>
        <th style="text-align: center;background-color: blue;color:yellow">raton marca</th>
        <th style="text-align: center;background-color: blue;color:yellow">raton modelo</th>
        <th style="text-align: center;background-color: blue;color:yellow">Adicional</th>
        <th style="text-align: center;background-color: blue;color:yellow">Nomenclatura</th>
        <th style="text-align: center;background-color: blue;color:yellow">I-Portal</th>
        <th style="text-align: center;background-color: blue;color:yellow">Correo de Planta</th>
        <th style="text-align: center;background-color: blue;color:yellow">Correo Institucional</th>
        <th style="text-align: center;background-color: blue;color:yellow">Portal de Distribuidores</th>
        <th style="text-align: center;background-color: blue;color:yellow">GEKO</th>
        <th style="text-align: center;background-color: blue;color:yellow">Clave Telefonica</th>
        <th style="text-align: center;background-color: blue;color:yellow">IP</th>
        <th style="text-align: center;background-color: blue;color:yellow">SIF</th>
        <th style="text-align: center;background-color: blue;color:yellow">POC</th>
        <th style="text-align: center;background-color: blue;color:yellow">NADCOM</th>
        <th style="text-align: center;background-color: blue;color:yellow">SAGA</th>
        <th style="text-align: center;background-color: blue;color:yellow">Modelo de Impresora</th>
        <th style="text-align: center;background-color: blue;color:yellow">Fecha compra</th>
        <th style="text-align: center;background-color: blue;color:yellow">Factura</th>
        <th style="text-align: center;background-color: blue;color:yellow">Garantia</th>
        <th style="text-align: center;background-color: blue;color:yellow">Grupo Fortinet</th>
        <th style="text-align: center;background-color: blue;color:yellow">CPU o laptop</th>
        <th style="text-align: center;background-color: blue;color:yellow">Usuario de red</th>
        <th style="text-align: center;background-color: blue;color:yellow">Programas Instalados</th>
        <th style="text-align: center;background-color: blue;color:yellow">VNC</th>
        <th style="text-align: center;background-color: blue;color:yellow">Adobe</th>
        <th style="text-align: center;background-color: blue;color:yellow">GDS</th>
        <th style="text-align: center;background-color: blue;color:yellow">Antivirus</th>
        <th style="text-align: center;background-color: blue;color:yellow">Office</th>
        <th style="text-align: center;background-color: blue;color:yellow">Mantenimiento</th>
        <th style="text-align: center;background-color: blue;color:yellow">Usuario de GDS</th>
        <th style="text-align: center;background-color: blue;color:yellow">Regulador</th>
        <th style="text-align: center;background-color: blue;color:yellow">Marca Modelo</th>
    </tr>
            </thead>

            <tbody>
        @foreach($inventorys as $dato)
    <tr>
        <th style="text-align: center;">{{$dato->Nombre_de_Usuario}}</th>
        <th style="text-align: center;">{{$dato->Puesto}}</th>
        <th style="text-align: center;">{{$dato->Departamento}}</th>
        <th style="text-align: center;">{{$dato->Marca}}</th>
        <th style="text-align: center;">{{$dato->Modelo}}</th>
        <th style="text-align: center;">{{$dato->No_de_Serie}}</th>
        <th style="text-align: center;">{{$dato->Procesador}}</th>
        <th style="text-align: center;">{{$dato->Ghz}}</th>
        <th style="text-align: center;">{{$dato->Disco}}</th>
        <th style="text-align: center;">{{$dato->Mem_Ram}}</th>
        <th style="text-align: center;">{{$dato->Sistema_Operativo}}</th>
        <th style="text-align: center;">{{$dato->Monitor}}</th>
        <th style="text-align: center;">{{$dato->Marca_Monitor}}</th>
        <th style="text-align: center;">{{$dato->Modelo_Monitor}}</th>
        <th style="text-align: center;">{{$dato->teclado_serie}}</th>
        <th style="text-align: center;">{{$dato->teclado_marca}}</th>
        <th style="text-align: center;">{{$dato->teclado_modelo}}</th>
        <th style="text-align: center;">{{$dato->raton_serie}}</th>
        <th style="text-align: center;">{{$dato->raton_marca}}</th>
        <th style="text-align: center;">{{$dato->raton_modelo}}</th>
        <th style="text-align: center;">{{$dato->ADICIONAL}}</th>
        <th style="text-align: center;">{{$dato->Nomenclatura}}</th>
        <th style="text-align: center;">{{$dato->I_Portal}}</th>
        <th style="text-align: center;">{{$dato->Correo_de_Planta}}</th>
        <th style="text-align: center;">{{$dato->Correo_Institucional}}</th>
        <th style="text-align: center;">{{$dato->Portal_de_Distribuidores}}</th>
        <th style="text-align: center;">{{$dato->GEKO}}</th>
        <th style="text-align: center;">{{$dato->Clave_Telefonica}}</th>
        <th style="text-align: center;">{{$dato->IP}}</th>
        <th style="text-align: center;">{{$dato->SIF}}</th>
        <th style="text-align: center;">{{$dato->POC}}</th>
        <th style="text-align: center;">{{$dato->NADCON}}</th>
        <th style="text-align: center;">{{$dato->SAGA}}</th>
        <th style="text-align: center;">{{$dato->Modelo_de_impresora}}</th>
        <th style="text-align: center;">{{$dato->FECHA_COMPRA}}</th>
        <th style="text-align: center;">{{$dato->FACTURA}}</th>
        <th style="text-align: center;">{{$dato->GARANTIA}}</th>
        <th style="text-align: center;">{{$dato->GRUPO_FORTINET}}</th>
        <th style="text-align: center;">{{$dato->CPU_O_LAPTOP}}</th>
        <th style="text-align: center;">{{$dato->USUARIO_DE_RED}}</th>
        <th style="text-align: center;">{{$dato->Programas_Instalados}}</th>
        <th style="text-align: center;">{{$dato->VNC}}</th>
        <th style="text-align: center;">{{$dato->Adobe}}</th>
        <th style="text-align: center;">{{$dato->GDS}}</th>
        <th style="text-align: center;">{{$dato->Antivirus}}</th>
        <th style="text-align: center;">{{$dato->OFFICE}}</th>
        <th style="text-align: center;">{{$dato->MANTENIMIENTO}}</th>
        <th style="text-align: center;">{{$dato->USUARIO_DE_GDS}}</th>
        <th style="text-align: center;">{{$dato->REGULADOR}}</th>
        <th style="text-align: center;">{{$dato->MARCA_MODELO}}</th>
    </tr>
    @endforeach
            </tbody>
        </table>
    </body>
    </html>
