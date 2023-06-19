<?php

namespace App\Policies;

use App\Models\OfficeCarType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficeCarTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param OfficeCarType $officeCarType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OfficeCarType $officeCarType)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param OfficeCarType $officeCarType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, OfficeCarType $officeCarType)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param OfficeCarType $officeCarType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, OfficeCarType $officeCarType)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param OfficeCarType $officeCarType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OfficeCarType $officeCarType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param OfficeCarType $officeCarType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OfficeCarType $officeCarType)
    {
        //
    }
}
