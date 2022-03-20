<?php

namespace App\Filters;

use App\Models\User;
use Carbon\Carbon;

class GameFilters extends DataTransferObject
{
    /** @var string */
    public $title;
    /** @var string */
    public $description;
    /** @var User */
    public $organisateur;
    /** @var Carbon */
    public $date;
    /** @var bool */
    public $draft;
    /** @var bool */
    public $visibility;
    /** @var string */
    public $terrain;
    /** @var int */
    public $nb_players;

}
