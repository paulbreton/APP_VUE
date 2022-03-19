<?php namespace App\Repositories;

use App\Models\Roles;

class RolesRepository extends BaseRepository
{
    public function __construct(Roles $model)
    {
        parent::__construct($model);
    }

    public function getAll() {
        return Roles::all();
    }

    /**
     * @return mixed
     */
    public function whereUserIsAdmin() {
        return Roles::where('id', '!=', '2')->get();
    }
}
