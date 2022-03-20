<?php

namespace App\Managers;

use App\Filters\GameFilters;
use App\Http\Resources\GameResource;
use App\Managers\CommonManager;
use App\Models\Game;
use App\Repositories\GameRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GameManager extends CommonManager
{
    public function __construct(GameRepository $gameRepository) {
        $this->repository = $gameRepository;
    }

    /**
     * @param GameFilters $filters
     * @return Builder[]|Collection
     */
    public function games(GameFilters $filters) {
        return $this->repository->buildQuery($filters);
    }

    /**
     * @param GameFilters $filters
     * @return mixed
     */
    public function store(GameFilters $filters) {
        return $this->repository->store($filters);
    }

    public function update(GameFilters $filters, Game $game)
    {
        return $this->repository->buildUpdate($filters, $game);
    }
}
