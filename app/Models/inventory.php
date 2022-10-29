<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $fillable=['Nombre_de_Usuario',
    'Puesto',
    'Departamento',
    'Marca',
    'Modelo',
    'No_de_Serie',
    'Procesador',
    'Ghz',
    'Disco',
    'Mem_Ram',
    'Sistema_Operativo',
    'Monitor',
    'Marca_Monitor',
    'Modelo_Monitor',
    'ADICIONAL',
    'Nomenclatura',
    'I_Portal' ,
    'Correo_de_Planta' ,
    'Correo_Institucional' ,
    'Portal_de_Distribuidores' ,
    'GEKO' ,
    'Clave_Telefonica' ,
    'IP' ,
    'SIF' ,
    'POC' ,
    'NADCON' ,
    'SAGA' ,
    'Modelo_de_impresora' ,
    'FECHA_COMPRA' ,
    'FACTURA' ,
    'GARANTIA' ,
    'GRUPO_FORTINET' ,
    'CPU_O_LAPTOP' ,
    'USUARIO_DE_RED' ,
    'Programas_Instalados' ,
    'VNC' ,
    'Adobe' ,
    'GDS' ,
    'Antivirus' ,
    'OFFICE' ,
    'MANTENIMIENTO' ,
    'USUARIO_DE_GDS',
    'REGULADOR' ,
    'MARCA_MODELO',
];
}
