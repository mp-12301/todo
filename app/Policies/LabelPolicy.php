<?php

namespace App\Policies;

use App\User;
use App\Label;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any labels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the label.
     *
     * @param  \App\User  $user
     * @param  \App\Label  $label
     * @return mixed
     */
    public function view(User $user, Label $label)
    {
        return $user->id === $label->user_id;
    }

    /**
     * Determine whether the user can create labels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the label.
     *
     * @param  \App\User  $user
     * @param  \App\Label  $label
     * @return mixed
     */
    public function update(User $user, Label $label)
    {
        return $user->id === $label->user_id;
    }

    /**
     * Determine whether the user can delete the label.
     *
     * @param  \App\User  $user
     * @param  \App\Label  $label
     * @return mixed
     */
    public function delete(User $user, Label $label)
    {
        return $user->id === $label->user_id;
    }

    /**
     * Determine whether the user can restore the label.
     *
     * @param  \App\User  $user
     * @param  \App\Label  $label
     * @return mixed
     */
    public function restore(User $user, Label $label)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the label.
     *
     * @param  \App\User  $user
     * @param  \App\Label  $label
     * @return mixed
     */
    public function forceDelete(User $user, Label $label)
    {
        //
    }
}
