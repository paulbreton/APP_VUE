<?php

namespace App\Http\Resources\Tours\FamilyTours;

use App\Models\Tour\FamilyTour;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FamilyTourResource
 *
 * @package App\Http\Resources\Tours\FamilyTours
 */
class FamilyTourResource extends JsonResource
{
    /** @var FamilyTour */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'wording' => $this->resource['wording'],
            'is_used' => $this->resource['types_tour_count'] > 0,
        ];
    }
}
