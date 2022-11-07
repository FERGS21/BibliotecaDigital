<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Area;
use App\Models\Autore;
use App\Models\Edicione;
use App\Models\Editoriale;
use App\Models\Persona;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*  $usuario= User::create([
            'name' => 'Luis Fernando',
            'email' => 'fer@gmailcom',
            'password'=> bcrypt('12345678')
        ]);

        $rol=Role::create(['name'=> 'Administrador']);

        $permisos = Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        $usuario->assignRole(['Administrador']);*/
    }
}
