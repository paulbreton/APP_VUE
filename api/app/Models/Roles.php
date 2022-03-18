<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Roles
 *
 * @package App\Models\Roles
 * @property int                $id
 * @property string             $label
 */
class Roles extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}

