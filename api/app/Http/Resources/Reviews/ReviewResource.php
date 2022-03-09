<?php

namespace App\Http\Resources\Reviews;

use App\Models\Review\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ReviewResource
 *
 * @package App\Http\Resources\Reviews
 */
class ReviewResource extends JsonResource
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
            'configuratedReview' => ConfiguratedReviewResource::make($this->whenLoaded('configuratedReview')),
            'startDate' => $this->resource->startDate->format('Y-m-d'),
            'type' => $this->resource->type,
            'directorId' => $this->resource->directorId,
            'serviceId' => $this->resource->serviceId,
            'workshopId' => $this->resource->workshopId,
            'zoneId' => $this->resource->zoneId,
            'parentId' => $this->resource->parentId,
            'status' => $this->resource->status,
        ];
    }
}
