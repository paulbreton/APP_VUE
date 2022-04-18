<?php namespace App\Repositories;

use App\Filters\CommentFilters;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends BaseRepository
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    /**
     * @param CommentFilters $filters
     * @return mixed
     */
    public function store(CommentFilters $filters)
    {
        return Comment::create([
            'content' => $filters->content,
            'user_id' => $filters->user_id,
            'game_id' => $filters->game_id
        ]);
    }
}
