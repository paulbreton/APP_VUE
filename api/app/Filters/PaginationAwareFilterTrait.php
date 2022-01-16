<?php

namespace App\Filters;

/**
 * Trait PaginationAwareFilterTrait
 *
 * @package App\Filters
 */
trait PaginationAwareFilterTrait
{
    public $page;
    public $perPage;

    public function page(): ?int
    {
        return $this->page;
    }

    public function perPage(): ?int
    {
        return $this->perPage;
    }
}
