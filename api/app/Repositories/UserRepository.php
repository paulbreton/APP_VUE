<?php namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    
    public function getAll() {
        return User::where('id', '!=', Auth::id())->get();
    }

    public function deleteUser(int $id) {
      return User::where('id', $id)->delete();
    }
}