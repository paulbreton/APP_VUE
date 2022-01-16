<?php

namespace App\Filters;

/**
 * Interface PaginationAwareFilter
 *
 * @package App\Filters
 */
interface PaginationAwareFilter
{
    public function page(): ?int;

    public function perPage(): ?int;
}
