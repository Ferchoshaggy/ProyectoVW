<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_de_Usuario');
            $table->string('Puesto');
            $table->string('Departamento');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('No_de_Serie');
            $table->string('Procesador');
            $table->string('Ghz');
            $table->string('Disco');
            $table->string('Mem_Ram');
            $table->string('Sistema_Operativo');
            $table->string('Monitor');
            $table->string('Marca_Monitor');
            $table->string('Modelo_Monitor');
            $table->string('ADICIONAL');
            $table->string('Nomenclatura');
            $table->string('I-Portal');
            $table->string('Correo_de_Planta');
            $table->string('Correo_Institucional')->unique();
            $table->string('Portal_de Distribuidores');
            $table->string('GEKO');
            $table->string('Clave_Telefonica');
            $table->string('IP');
            $table->string('SIF');
            $table->string('POC');
            $table->string('NADCON');
            $table->string('SAGA');
            $table->string('Modelo_de_impresora');
            $table->string('FECHA_COMPRA');
            $table->string('FACTURA');
            $table->string('GARANTIA');
            $table->string('GRUPO_FORTINET');
            $table->string('CPU_O_LAPTOP');
            $table->string('USUARIO_DE_RED');
            $table->string('Programas_Instalados');
            $table->string('VNC');
            $table->string('Adobe');
            $table->string('GDS');
            $table->string('Antivirus');
            $table->string('OFFICE');
            $table->string('MANTENIMIENTO');
            $table->string('USUARIO_DE_GDS');
            $table->string('REGULADOR');
            $table->string('MARCA_MODELO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
