<?php

namespace App\Filters;

class CommentFilters extends DataTransferObject
{
    /** @var string */
    public $content;
    /** @var int */
    public $user_id;
    /** @var int */
    public $game_id;
}
