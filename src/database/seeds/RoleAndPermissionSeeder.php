<?php

use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\Spatie\Permission\Models\Role::whereName(config('permission.default_roles')[0])->count() < 1) {
            // Creating roles bases on the permission's config
            foreach (config('permission.default_roles') as $roleName) {
                \Spatie\Permission\Models\Role::create([
                    'name' => $roleName
                ]);
            }

        }

        if (\Spatie\Permission\Models\Permission::whereName(config('permission.default_permissions')[0])->count() < 1) {
            // Creating permissions bases on the permission's config
            foreach (config('permission.default_permissions') as $permissionName) {
                \Spatie\Permission\Models\Permission::create([
                    'name' => $permissionName
                ]);
            }
        }

    }
}
