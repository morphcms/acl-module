<?php

namespace Modules\Acl\Nova\Resources;

use App\Nova\Resource;
use App\Nova\User;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasManyThrough;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Permission extends Resource
{
    public static string $model = \Spatie\Permission\Models\Permission::class;

    public static $displayInNavigation = false;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name'),
            Text::make('Guard Name'),
            BelongsToMany::make('Roles', 'roles', Role::class),
            MorphToMany::make('Users', 'users', User::class),
        ];
    }
}
