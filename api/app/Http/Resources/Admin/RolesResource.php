<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RolesResource
 *
 * @package App\Http\Resources\Admin
 */
class RolesResource extends JsonResource
{
    /** @var Review */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'label' => $this->resource->label,
        ];
    }
}
