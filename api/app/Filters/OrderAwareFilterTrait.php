<?php

namespace App\Filters;

/**
 * Trait OrderAwareFilterTrait
 *
 * @package App\Filters
 */
trait OrderAwareFilterTrait
{
    /**
     * @var string
     */
    public $order;
    /**
     * @var string
     */
    public $orderBy;

    /**
     * @return string|null
     */
    public function order(): ?string
    {
        return $this->order;
    }

    /**
     * @return string|null
     */
    public function orderBy(): ?string
    {
        return $this->orderBy;
    }
}
