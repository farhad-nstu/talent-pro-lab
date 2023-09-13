<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['super-admin','admin','moderator','user'];

        foreach ($roles as $role) {
            $savedRole = Role::create(['name' => $role]);
            if(in_array($role,['super-admin','admin'])){
                $routes = Permission::all();
                $data = [];
                foreach($routes as $route){
                    $data[$route->name] = $route->name;
                }
                $savedRole->syncPermissions($data);
            } else{
                $data = [
                    'system.index'=>'system.index','logout.perform'=>'logout.perform','todos.index'=>'todos.index',
                    'todos.create'=>'todos.create','todos.store'=>'todos.store','todos.edit'=>'todos.edit','todos.destroy'=>'todos.destroy'
                ];
                $savedRole->syncPermissions($data);
            }
        }
    }
}
