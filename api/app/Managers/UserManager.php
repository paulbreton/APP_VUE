<?php 

namespace App\Managers;

use App\Managers\CommonManager;
use App\Repositories\UserRepository;

class UserManager extends CommonManager
{
    public function __construct(UserRepository $userRepository) {
        $this->repository = $userRepository;
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function delete(int $id) {
      return $this->repository->deleteUser($id);
    }
}