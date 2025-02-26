<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ContactQuery;
use App\Models\User;

class ContactQueryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ContactQuery');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('view ContactQuery');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ContactQuery');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('update ContactQuery');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('delete ContactQuery');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any ContactQuery');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('restore ContactQuery');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any ContactQuery');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('replicate ContactQuery');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder ContactQuery');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContactQuery $contactquery): bool
    {
        return $user->checkPermissionTo('force-delete ContactQuery');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any ContactQuery');
    }
}
