<?php

namespace App\Filters\Review;

use App\Filters\DataTransferObject;
use App\Filters\OrderAwareFilter;
use App\Filters\OrderAwareFilterTrait;
use App\Filters\PaginationAwareFilter;
use App\Filters\PaginationAwareFilterTrait;
use App\Traits\LocationContext;
use App\Traits\UserAwareTrait;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class DailyReviewFilter
 *
 * @package App\Filters\Review
 */
class DailyReviewFilter extends DataTransferObject implements OrderAwareFilter, PaginationAwareFilter, LocationContext
{
    use UserAwareTrait, OrderAwareFilterTrait, PaginationAwareFilterTrait;
    /**
     * @var Carbon
     */
    public $start;
    /**
     * @var Carbon
     */
    public $end;
    /**
     * @var string
     */
    public $status;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $serviceId;
    /**
     * @var Collection
     */
    public $workshopIds;
    /**
     * @var array
     */
    public $familyIds;
}
