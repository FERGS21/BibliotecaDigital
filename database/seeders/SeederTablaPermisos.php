<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            
            //Operaciones sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //operaciones sobre la tabla ediciones
            'ver-edicion',
            'crear-edicion',
            'editar-edicion',
            'borrar-edicion',

            //operaciones sobre la tabla editoriales
            'ver-editorial',
            'crear-editorial',
            'editar-editorial',
            'borrar-editorial', 

            //operaciones sobre la tabla areas
            'ver-area',
            'crear-area',
            'editar-area',
            'borrar-area',

            //operaciones sobre la tabla autores
            'ver-autor',
            'crear-autor',
            'editar-autor',
            'borrar-autor',
            //operaciones sobre la tabla autores
            'ver-libro',
            'crear-libro',
            'editar-libro',
            'borrar-libro',
            //operaciones sobre la tabla autores
            'ver-arignaautor',
            'crear-arignaautor',
            'editar-arignaautor',
            'borrar-arignaautor',
            //operaciones sobre la tabla autores
            'ver-ejemplar',
            'crear-ejemplar',
            'editar-ejemplar',
            'borrar-ejemplar',
            //operaciones sobre la tabla autores
            'ver-pertamo',
            'crear-pertamo',
            'editar-pertamo',
            'borrar-pertamo',
            
                      
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}