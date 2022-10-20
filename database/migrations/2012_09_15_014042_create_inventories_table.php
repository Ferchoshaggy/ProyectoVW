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
            $table->string('Nombre de Usuario');
            $table->string('Puesto');
            $table->string('Departamento');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('No de Serie');
            $table->string('Procesador');
            $table->string('Ghz');
            $table->string('Disco');
            $table->string('Mem Ram');
            $table->string('Sistema Operativo');
            $table->string('Monitor');
            $table->string('Marca Monitor');
            $table->string('Modelo Monitor');
            $table->string('ADICIONAL');
            $table->string('Nomenclatura');
            $table->string('I-Portal');
            $table->string('Correo de Planta');
            $table->string('Correo Institucional');
            $table->string('Portal de Distribuidores');
            $table->string('GEKO');
            $table->string('Clave Telefonica');
            $table->string('IP');
            $table->string('SIF');
            $table->string('POC');
            $table->string('NADCON');
            $table->string('SAGA');
            $table->string('Modelo de impresora');
            $table->string('FECHA COMPRA');
            $table->string('FACTURA');
            $table->string('GARANTIA');
            $table->string('GRUPO FORTINET');
            $table->string('CPU O LAPTOP');
            $table->string('USUARIO DE RED');
            $table->string('Programas Instalados');
            $table->string('VNC');
            $table->string('Adobe');
            $table->string('GDS');
            $table->string('Antivirus');
            $table->string('OFFICE');
            $table->string('MANTENIMIENTO');
            $table->string('USUARIO DE GDS');
            $table->string('REGULADOR');
            $table->string('MARCA MODELO');
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
