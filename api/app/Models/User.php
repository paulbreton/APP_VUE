<?php

namespace App\Models;

use App\Models\Roles;
use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Models\User
 * @property int                $id
 * @property string             $username
 * @property string             $email
 * @property string             $name
 */
class User extends Authenticatable
{
    use Friendable, HasFactory, Notifiable;

    public function role() {
        return $this->belongsTo(Roles::class);
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
