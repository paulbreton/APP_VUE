<?php

namespace App\Policies\Tour;

use App\Enums\Roles\RoleEnum;
use App\Policies\AbstractApiPolicy;
use App\User;

/**
 * Class FamilyTourPolicy
 *
 * @package App\Policies\Tour
 */
class FamilyTourPolicy extends AbstractApiPolicy
{
    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user): bool
    {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user): bool
    {
        return $user->hasRolesAmong(RoleEnum::ROLES_ADMIN_TOUR);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $user->hasRolesAmong(RoleEnum::ROLES_ADMIN_TOUR);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function destroy(User $user): bool
    {
        return $user->hasRolesAmong(RoleEnum::ROLES_ADMIN_TOUR);
    }
}
