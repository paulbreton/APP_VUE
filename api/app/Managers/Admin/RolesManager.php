<?php 

namespace App\Managers\Admin;

use App\Filters\Admin\RolesFilter;
use App\Managers\CommonManager;
use App\Repositories\RolesRepository;

class RolesManager extends CommonManager
{
    public function __construct(RolesRepository $roleRepository) {
        $this->repository = $roleRepository;
    }

    public function create(RolesFilter $role) {
        $this->repository->createRole($role->label);
    }

    public function delete(int $id) {
        $this->repository->delete($id);
    }

    public function getAll() {
        return $this->repository->getAll();
    }
}