<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
        'content',
        'game_id',
        'user_id',
        'id',
        'created_at'
    ];

    /**
     * @return BelongsTo
     */
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function game() :BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
