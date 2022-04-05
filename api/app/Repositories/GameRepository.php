<?php namespace App\Repositories;

use App\Filters\GameFilters;
use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GameRepository extends BaseRepository
{
    public function __construct(Game $model)
    {
        parent::__construct($model);
    }

    /**
     * @param GameFilters $filters
     * @return mixed
     */
    public function store(GameFilters $filters)
    {
        return Game::create([
            'title' => $filters->title,
            'description' => $filters->description,
            'organisateur_id' => $filters->organisateur,
            'draft' => $filters->draft,
            'visibility' => $filters->visibility,
            'terrain' => $filters->terrain,
            'date' => $filters->date,
            'nb_players' => $filters->nb_players,
            'creator_id' => 1,
        ]);
    }

    /**
     * @param GameFilters $filters
     * @return Builder[]|Collection
     */
    public function buildQuery(GameFilters $filters) {
        $query = $this->model->newQuery();

        if (isset($filters->visibility)) {
            $query->where('visibility', $filters->visibility);
        }
        if (isset($filters->draft)) {
            $query->where('draft', $filters->draft);
        }
        if (isset($filters->createur)) {
            $query->where('creator_id', $filters->createur);
        }

        return $query->orderBy('date', 'desc')->get();


    }

    public function buildUpdate(GameFilters $filters, Game $game)
    {
        if (isset($filters->title)) {
            $game->title = $filters->title;
        }
        if (isset($filters->description)) {
            $game->description = $filters->description;
        }
        if (isset($filters->terrain)) {
            $game->terrain = $filters->terrain;
        }
        if (isset($filters->date)) {
            $game->date = $filters->date;
        }
        if (isset($filters->visibility)) {
            $game->visibility = $filters->visibility;
            if($filters->visibility == 1) {
                $game->draft = 0;
            }
        }
        if (isset($filters->draft)) {
            $game->draft = $filters->draft;
            if($filters->draft == 1) {
                $game->visibility = 0;
            }
        }
        if (isset($filters->nb_players)) {
            $game->nb_players = $filters->nb_players;
        }
        if (isset($filters->organisateur)) {
            $game->organisateur = $filters->organisateur;
        }

        return $game->save();

    }
}
