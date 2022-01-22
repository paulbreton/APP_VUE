<?php namespace App\Repositories;

use App\Models\Roles;

class RolesRepository extends BaseRepository
{
    public function __construct(Roles $model)
    {
        parent::__construct($model);
    }
    
    public function createRole(string $label) {
        Roles::create([
            'label' => $label,
        ]);
    }

    public function deleteRole(int $id) {
        Roles::find($id)->delete();
    }

    public function getAll() {
        return Roles::all();
    }
}