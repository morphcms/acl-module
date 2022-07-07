<?php

namespace Modules\Acl\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Modules\Acl\Nova\Resources\Permission;
use Modules\Acl\Nova\Resources\Role;

class PermissionsTool extends Tool
{
   protected static array $resources = [
       Permission::class,
       Role::class,
   ];

    public function boot()
    {
        Nova::resources(static::$resources);
    }

    public function menu(Request $request)
    {
        return MenuSection::make('ACL', [
            MenuItem::resource(Permission::class)->canSee(fn() => $request->user()->can('permissions.viewAny')),
            MenuItem::resource(Role::class)->canSee(fn() => $request->user()->can('roles.viewAny')),
        ])->icon('users')->collapsable();
    }
}
