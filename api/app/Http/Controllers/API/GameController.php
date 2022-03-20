<?php

namespace App\Http\Controllers\API;

use App\Filters\GameFilters;
use App\Http\Controllers\AbstractApiController;
use App\Http\Requests\Game\GameIndexRequest;
use App\Http\Requests\Game\GameStoreRequest;
use App\Http\Requests\Game\GameUpdateRequest;
use App\Http\Resources\GameResource;
use App\Managers\GameManager;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class GameController extends AbstractApiController
{
    /**
     * @param GameIndexRequest $request
     * @param GameManager $gameManager
     * @return JsonResponse
     */
    public function index(GameIndexRequest $request, GameManager $gameManager) {
        /** @var GameFilters $filters */
        $filters = GameFilters::fromRequest($request);

        $game = $gameManager->games($filters);

        return $this->respond(GameResource::collection($game));
    }

    /**
     * @param Game $game
     * @return JsonResponse
     */
    public function show(Game $game) {
        return $this->respond(GameResource::make($game));
    }


    /**
     * @param GameUpdateRequest $request
     * @param GameManager $gameManager
     * @return JsonResponse
     */
    public function update(GameUpdateRequest $request, Game $game, GameManager $gameManager) {
        /** @var GameFilters $filters */
        $filters = GameFilters::fromRequest($request);

        $gameManager->update($filters, $game);

        return $this->respondEmpty();
    }

    /**
     * @param GameStoreRequest $request
     * @param GameManager $gameManager
     * @return JsonResponse
     */
    public function store(GameStoreRequest $request, GameManager $gameManager) {
        /** @var GameFilters $filters */
        $filters = GameFilters::fromRequest($request);

        if($request->input('date')) {
            $filters->date = Carbon::make($request->input('date'));
        }

        $gameManager->store($filters);

        return $this->respondEmpty();

    }
}
