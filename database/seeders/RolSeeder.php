<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver Listado de Categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear Nuevas Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.delete', 'description' => 'Eliminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear Nuevos Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.delete', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.roles.index', 'description' => 'Listar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Nuevos Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete', 'description' => 'Eliminar Roles'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.tags.index', 'description' => 'Ver Listado de Etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create', 'description' => 'Crear Nuevas Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'Editar Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.delete', 'description' => 'Eliminar Etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 'description' => 'Ver Listado de Publicaciones'])->syncRoles([$role2, $role1]);
        Permission::create(['name' => 'admin.posts.create', 'description' => 'Crear Nuevas Publicaciones'])->syncRoles([$role2, $role1]);
        Permission::create(['name' => 'admin.posts.edit', 'description' => 'Editar Publicaciones'])->syncRoles([$role2, $role1]);
        Permission::create(['name' => 'admin.posts.delete', 'description' => 'Eliminar Publicaciones'])->syncRoles([$role2, $role1]);


        $user = \App\Models\User::factory()->create([
            'name' => 'caal2096',
            'email' => 'caal2096@gmail.com',
            'password' => bcrypt('1234')
        ]);
        $user->assignRole($role1);
    }
}
