<?php

namespace Modules\AclModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class AclDatabaseSeeder extends Seeder
{
    protected array $roles = [
        'super-admin',
        'admin',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

       foreach ($this->roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
