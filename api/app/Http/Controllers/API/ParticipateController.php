<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AbstractApiController;
use App\Models\Game;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ParticipateController extends AbstractApiController
{
    /**
     * @param Game $game
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function store(Game $game, User $user) {
        
        if ($game->users()->count() >= $game->nb_players) {
            throw new NotFoundHttpException("Game is full");
        }
        $game->users()->attach($user);
        return $this->respondEmpty();
    }

    /**
     * @param Game $game
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(Game $game, User $user) {

        $game->users()->detach($user);

        return $this->respondEmpty();
    }
}
