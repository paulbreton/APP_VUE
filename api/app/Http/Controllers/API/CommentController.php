<?php

namespace App\Http\Controllers\API;

use App\Events\SendComment;
use App\Filters\CommentFilters;
use App\Http\Controllers\AbstractApiController;
use App\Http\Requests\Comment\CommentStoreRequest;
use App\Managers\CommentManager;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends AbstractApiController
{
    private $manager;

    public function __construct(CommentManager $commentManager) {
        $this->manager = $commentManager;
    }

    /**
     * @return JsonResponse
     */
    public function store(Game $game, CommentStoreRequest $commentStoreRequest) {

        /** @var CommentFilters $filters */
        $filters = CommentFilters::fromRequest($commentStoreRequest);

        $filters->game_id = $game->id;
        $filters->user_id = Auth::user()->id;

        $this->manager->newComment($filters);

        event(new SendComment($filters->game_id, $filters->content));

        return $this->respondEmpty();
    }
}
