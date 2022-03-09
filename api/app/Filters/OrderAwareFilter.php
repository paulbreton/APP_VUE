<?php

namespace App\Filters;

/**
 * Interface OrderAwareFilter
 *
 * @package App\Filters
 */
interface OrderAwareFilter
{
    public function order(): ?string;

    public function orderBy(): ?string;
}
