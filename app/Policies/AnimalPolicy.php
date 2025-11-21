<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Animal $animal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
   public function create(User $user)
{
    return true; // ou sua lógica
}

public function update(User $user, Animal $animal){
    return $user->id === $animal->user_id;
}
public function delete(User $user, Animal $animal){
    return $user->id === $animal->user_id;
}


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Animal $animal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Animal $animal): bool
    {
        return false;
    }
}
