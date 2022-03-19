<?php

namespace App\Managers\Admin;

use App\Filters\Admin\RolesFilter;
use App\Managers\CommonManager;
use App\Repositories\RolesRepository;
use Illuminate\Support\Facades\Auth;

class RolesManager extends CommonManager
{
    public function __construct(RolesRepository $roleRepository) {
        $this->repository = $roleRepository;
    }

    public function getAll() {
        $user = Auth::user();

        if($user->isSuperAdmin()){
            $res = $this->repository->getAll();
        } else {
            $res = $this->repository->whereUserIsAdmin();
        }
        return $res;
    }
}
