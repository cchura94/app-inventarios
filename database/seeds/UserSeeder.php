<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = new Role;
        $rol1->nombre = "admin";
        $rol1->descripcion = "acceso total";
        $rol1->save();

        $rol2 = new Role;
        $rol2->nombre = "contador";
        $rol2->descripcion = "acceso solo algunas vistas";
        $rol2->save();


        $usuario = new User;
        $usuario->name = "Juan Perez";
        $usuario->email = "juan@empresa.com";
        $usuario->password = bcrypt("admin123");
        $usuario->save();

        $usuario->roles()->attach($rol1);

        $usuario = new User;
        $usuario->name = "Oscar Prueba";
        $usuario->email = "oscar@empresa.com";
        $usuario->password = bcrypt("oscar123");
        $usuario->save();

        $usuario->roles()->attach($rol2);

    }
}
