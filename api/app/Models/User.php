<?php

namespace App\Models;

use App\Models\Roles;
use App\Traits\Friendable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @package App\Models\User
 * @property int    $id
 * @property string $username
 * @property string $email
 * @property string $name
 */
class User extends Authenticatable
{
    use Friendable, HasFactory, Notifiable, HasApiTokens;

    /**
     * @return BelongsTo
     */
    public function role() :BelongsTo
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function isSuperAdmin() {
        return $this->role_id === 2;
    }

    public function isAdmin() {

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'pseudo',
        'role_id',
    ];

    protected $visible = [
        'name',
        'email',
        'pseudo',
        'role_id',
        'username',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
