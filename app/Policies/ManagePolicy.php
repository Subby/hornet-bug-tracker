<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class ManagePolicy
{
    use HandlesAuthorization;

    /**
     * Check whether the user has access to the manage panel.
     * @param User $user
     * @return bool
     */
    public function accessManagePanel(User $user)
    {
        return $user->admin == true;
    }
}
