<?php

namespace Modules\Acl\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
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

    public function view(User $user, Permission $permission): bool
    {
        return $user->can('permissions.view');
    }

    public function viewAny(User $user): bool
    {
        return $user->can('permissions.viewAny');
    }

    public function replicate(User $user, Permission $permission): bool
    {
        return $user->can('permissions.replicate');
    }

    public function edit(User $user, Permission $permission): bool
    {
        return $user->can('permissions.edit');
    }

    public function create(User $user): bool
    {
        return $user->can('permissions.create');
    }

    public function update(User $user, Permission $permission): bool
    {
        return $user->can('permissions.update');
    }

    public function delete(User $user, Permission $permission): bool
    {
        return $user->can('permissions.delete');
    }
}
