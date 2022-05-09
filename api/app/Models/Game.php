<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'games_users');
    }

    /**
     * @return HasMany
     */
    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * @return HasOne
     */
    public function organisateur() :HasOne
    {
        return $this->hasOne(User::class, 'id', 'organisateur_id');
    }

    /**
     * @return HasOne
     */
    public function creator() :HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

}
