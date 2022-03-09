<?php

namespace App\Http\Resources\Reviews;

use App\Http\Resources\Tours\FamilyTours\FamilyTourResource;
use App\Models\Review\ConfiguratedReview;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ConfiguratedReviewResource
 *
 * @package App\Http\Resources\Reviews
 */
class ConfiguratedReviewResource extends JsonResource
{
    /** @var ConfiguratedReview */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'familyTours' => FamilyTourResource::collection($this->whenLoaded('familyTours')),
        ];
    }
}
