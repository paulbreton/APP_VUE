<?php

namespace App\Filters\Tour\Family;

use App\Filters\DataTransferObject;
use App\Filters\OrderAwareFilter;
use App\Filters\OrderAwareFilterTrait;
use App\Filters\PaginationAwareFilter;
use App\Filters\PaginationAwareFilterTrait;

/**
 * Class FamilyTourFilter
 *
 * @package App\Filters\Tour\Family
 */
class FamilyTourFilter extends DataTransferObject implements OrderAwareFilter, PaginationAwareFilter
{
    use OrderAwareFilterTrait, PaginationAwareFilterTrait;

    /**
     * @var string
     */
    public $wording;
}
