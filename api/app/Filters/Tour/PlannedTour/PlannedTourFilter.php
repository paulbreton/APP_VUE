<?php

namespace App\Filters\Tour\PlannedTour;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class PlannedTourFilter
 *
 * @package App\Filters\Tour\PlannedTour
 */
class PlannedTourFilter
{
    /**
     * @var string
     */
    public $siteId;
    /**
     * @var Collection
     */
    public $ids;
    /**
     * @var Carbon
     */
    public $minimalStartEventDate;
}
