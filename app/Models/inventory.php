<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $fillable=['Nombre de Usuario',
    'Puesto',
    'Departamento',
    'Marca',
    'Modelo',
    'No de Serie',
    'Procesador',
    'Ghz',
    'Disco',
    'Mem Ram',
    'Sistema Operativo',
    'Monitor',
    'Marca Monitor',
    'Modelo Monitor',
    'ADICIONAL',
    'Nomenclatura',
    'I-Portal' ,
    'Correo de Planta' ,
    'Correo Institucional' ,
    'Portal de Distribuidores' ,
    'GEKO' ,
    'Clave Telefonica' ,
    'IP' ,
    'SIF' ,
    'POC' ,
    'NADCON' ,
    'SAGA' ,
    'Modelo de impresora' ,
    'FECHA COMPRA' ,
    'FACTURA' ,
    'GARANTIA' ,
    'GRUPO FORTINET' ,
    'CPU O LAPTOP' ,
    'USUARIO DE RED' ,
    'Programas Instalados' ,
    'VNC' ,
    'Adobe' ,
    'GDS' ,
    'Antivirus' ,
    'OFFICE' ,
    'MANTENIMIENTO' ,
    'USUARIO DE GDS',
    'REGULADOR' ,
    'MARCA MODELO',
];
}
