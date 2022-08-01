<?php

namespace Modules\Acl\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Modules\Acl\Nova\Resources\Role;
use Outl1ne\MultiselectField\Multiselect;

class AssignRole extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $products
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $users)
    {
        $role = $fields->get('role');

        foreach ($users as $user) {
            $user->assignRole($role);
        }

        return Action::message(__('Role assigned'));
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     *
     * @throws \Exception
     */
    public function fields(NovaRequest $request)
    {
        return [
            Multiselect::make(__('Role'), 'role')
                ->singleSelect()
                ->asyncResource(Role::class),
        ];
    }
}
