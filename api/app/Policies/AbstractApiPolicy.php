<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

abstract class AbstractApiPolicy
{
    use HandlesAuthorization;
}
