<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TipoUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

$usuario=['Administrador','Usuarios'];

for($i=0;$i<count($usuario);$i++){
        DB::table('tipo_users')->insert([
            'tipo' => $usuario[$i],

        ]);

}

        DB::table('users')->insert([
            'name'  => 'Sistemas',
            'tipo_user' => 1,
            'genero'=>'Masculino',
            'concesionaria'=>'Fersan',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);


    }
}
