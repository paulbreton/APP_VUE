<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AbstractApiController;
use App\Models\Game;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class ParticipateController extends AbstractApiController
{
    /**
     * @param Game $game
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function store(Game $game, User $user) {
        try {
            $game->users()->attach($user);
        } catch (Exception $exception) {
            throw $exception;
        }

        return $this->respondEmpty();
    }

    public function destroy(Game $game, User $user) {

        $game->users()->detach($user);

        return $this->respondEmpty();
    }
}
