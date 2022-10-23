<?php

namespace App\Imports;

use App\Models\inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class InventoryImport implements ToModel, WithHeadingRow
{
use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {


        return new inventory([
           'Nombre de Usuario' => $row['nombre_de_usuario'] ?? null,
           'Puesto' => $row["puesto"] ?? null,
           'Departamento' => $row["departamento"] ?? null,
           'Marca' => $row["marca"] ?? null,
           'Modelo' => $row["modelo"] ?? null,
           'No de Serie' => $row["no_de_serie"] ?? null,
           'Procesador' => $row["procesador"] ?? null,
           'Ghz' => $row["ghz"] ?? null,
           'Disco' => $row["disco"] ?? null,
           'Mem Ram' => $row["mem_ram"] ?? null,
           'Sistema Operativo' => $row["sistema_operativo"] ?? null,
           'Monitor' => $row["monitor"] ?? null,
           'Marca Monitor' => $row["marca_monitor"] ?? null,
           'Modelo Monitor' => $row["modelo_monitor"] ?? null,
           'ADICIONAL' => $row["adicional"] ?? null,
           'Nomenclatura' => $row["nomenclatura"] ?? null,
           'I-Portal' => $row["i_portal"] ?? null,
           'Correo de Planta' => $row["correo_de_planta"] ?? null,
           'Correo Institucional' => $row["correo_institucional"] ?? null,
           'Portal de Distribuidores' => $row["portal_de_distribuidores"] ?? null,
           'GEKO' => $row["geko"] ?? null,
           'Clave Telefonica' => $row["clave_telefonica"] ?? null,
           'IP' => $row["ip"] ?? null,
           'SIF' => $row["sif"] ?? null,
           'POC' => $row["poc"] ?? null,
           'NADCON' => $row["nadcon"] ?? null,
           'SAGA' => $row["saga"] ?? null,
           'Modelo de impresora' => $row["modelo_de_impresora"] ?? null,
           'FECHA COMPRA' => $row["fecha_compra"] ?? null,
           'FACTURA' => $row["factura"] ?? null,
           'GARANTIA' => $row["garantia"] ?? null,
           'GRUPO FORTINET' => $row["grupo_fortinet"] ?? null,
           'CPU O LAPTOP' => $row["cpu_o_laptop"] ?? null,
           'USUARIO DE RED' => $row["usuario_de_red"] ?? null,
           'Programas Instalados' => $row["programas_instalados"] ?? null,
           'VNC' => $row["vnc"] ?? null,
           'Adobe' => $row["adobe"] ?? null,
           'GDS' => $row["gds"] ?? null,
           'Antivirus' => $row["antivirus"] ?? null,
           'OFFICE' => $row["office"] ?? null,
           'MANTENIMIENTO' => $row["mantenimiento"] ?? null,
           'USUARIO DE GDS' => $row["usuario_de_gds"] ?? null,
           'REGULADOR' => $row["regulador"] ?? null,
           'MARCA MODELO' => $row["marca_modelo"] ?? null
        ]);
    }
}
