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
        'organisateur_id',
        'draft',
        'visibility',
        'date',
        'terrain',
        'creator_id'
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
        return $this->hasOne(User::class, 'id', 'organisateur_id');
    }

    /**
     * @return HasOne
     */
    public function createur() {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
