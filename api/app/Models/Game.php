<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    protected $table = 'game';

    protected $fillable = [
        'title',
        'description',
        'nb_players',
        'user_id',
        'draft',
        'visibility',
        'date',
        'terrain',
    ];

    /**
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'games_users');
    }

    /**
     * @return HasOne
     */
    public function organisateur() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
