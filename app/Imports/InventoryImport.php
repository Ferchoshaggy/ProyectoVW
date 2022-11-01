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

 //dd($row);
        return new inventory([
           'Nombre_de_Usuario' => $row['nombre_de_usuario'] ?? "N/A",
           'Puesto' => $row["puesto"] ?? "N/A",
           'Departamento' => $row["departamento"] ?? "N/A",
           'Marca' => $row["marca"] ?? "N/A",
           'Modelo' => $row["modelo"] ?? "N/A",
           'No_de_Serie' => $row["no_de_serie"] ?? "N/A",
           'Procesador' => $row["procesador"] ?? "N/A",
           'Ghz' => $row["ghz"] ?? "N/A",
           'Disco' => $row["disco"] ?? "N/A",
           'Mem_Ram' => $row["mem_ram"] ?? "N/A",
           'Sistema_Operativo' => $row["sistema_operativo"] ?? "N/A",
           'Monitor' => $row["monitor"] ?? "N/A",
           'Marca_Monitor' => $row["marca_monitor"] ?? "N/A",
           'Modelo_Monitor' => $row["modelo_monitor"] ?? "N/A",
           'ADICIONAL' => $row["adicional"] ?? "N/A",
           'Nomenclatura' => $row["nomenclatura"] ?? "N/A",
           'I_Portal' => $row["i_portal"] ?? "N/A",
           'Correo_de_Planta' => $row["correo_de_planta"] ?? "N/A",
           'Correo_Institucional' => $row["correo_institucional"] ?? "N/A",
           'Portal_de_Distribuidores' => $row["portal_de_distribuidores"] ?? "N/A",
           'GEKO' => $row["geko"] ?? "N/A",
           'Clave_Telefonica' => $row["clave_telefonica"] ?? "N/A",
           'IP' => $row["ip"] ?? "N/A",
           'SIF' => $row["sif"] ?? "N/A",
           'POC' => $row["poc"] ?? "N/A",
           'NADCON' => $row["nadcon"] ?? "N/A",
           'SAGA' => $row["saga"] ?? "N/A",
           'Modelo_de_impresora' => $row["modelo_de_impresora"] ?? "N/A",
           'FECHA_COMPRA' => $row["fecha_compra"] ?? "N/A",
           'FACTURA' => $row["factura"] ?? "N/A",
           'GARANTIA' => $row["garantia"] ?? "N/A",
           'GRUPO_FORTINET' => $row["grupo_fortinet"] ?? "N/A",
           'CPU_O_LAPTOP' => $row["cpu_o_laptop"] ?? "N/A",
           'USUARIO_DE_RED' => $row["usuario_de_red"] ?? "N/A",
           'Programas_Instalados' => $row["programas_instalados"] ?? "N/A",
           'VNC' => $row["vnc"] ?? "N/A",
           'Adobe' => $row["adobe"] ?? "N/A",
           'GDS' => $row["gds"] ?? "N/A",
           'Antivirus' => $row["antivirus"] ?? "N/A",
           'OFFICE' => $row["office"] ?? "N/A",
           'MANTENIMIENTO' => $row["mantenimiento"] ?? "N/A",
           'USUARIO_DE_GDS' => $row["usuario_de_gds"] ?? "N/A",
           'REGULADOR' => $row["regulador"] ?? "N/A",
           'MARCA_MODELO' => $row["marca_modelo"] ?? "N/A"
        ]);
    }
}
