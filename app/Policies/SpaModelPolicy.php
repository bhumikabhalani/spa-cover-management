<?php

namespace App\Policies;

use App\Models\SpaModel;
use App\Models\User;

class SpaModelPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, SpaModel $spaModel): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, SpaModel $spaModel): bool
    {
        return true;
    }

    public function delete(User $user, SpaModel $spaModel): bool
    {
        return true;
    }

    public function restore(User $user, SpaModel $spaModel): bool
    {
        return true;
    }

    public function forceDelete(User $user, SpaModel $spaModel): bool
    {
        return true;
    }
}
