<?php

namespace Modules\Acl\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function view(User $user, Role $role): bool
    {
        return $user->can('roles.view');
    }

    public function viewAny(User $user): bool
    {
        return $user->can('roles.viewAny');
    }

    public function replicate(User $user, Role $role): bool
    {
        return $user->can('roles.replicate');
    }

    public function edit(User $user, Role $role): bool
    {
        return $user->can('roles.edit');
    }

    public function create(User $user): bool
    {
        return $user->can('roles.create');
    }

    public function update(User $user, Role $role): bool
    {
        return $user->can('roles.update');
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->can('roles.delete');
    }
}
