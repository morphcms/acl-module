<?php

namespace Modules\Acl\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AclDatabaseSeeder extends Seeder
{
    protected array $resources = [
        'roles',
        'permissions',
    ];

    protected array $permissions = [
        '*',
        'view',
        'viewAny',
        'create',
        'update',
        'delete',
        'replicate',
        'assign',
        'revoke',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        Role::create(['name' => 'super-admin']);

        foreach ($this->resources as $resource) {
            foreach ($this->permissions as $permission) {
               Permission::create(['name' => $resource . '.' . $permission]);
            }
        }

        Role::create(['name' => 'admin'])->givePermissionTo(['roles.*', 'permissions.*']);
    }
}
