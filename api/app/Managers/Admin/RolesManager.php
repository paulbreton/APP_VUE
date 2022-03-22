<?php

namespace App\Managers\Admin;

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
        dump($user);
        if($user->isSuperAdmin()){
            $res = $this->repository->getAll();
        } else if($user->isAdmin()) {
            $res = $this->repository->whereUserIsAdmin();
        }
        return $res;
    }
}
