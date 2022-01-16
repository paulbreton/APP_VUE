<?php

namespace App\Http\Requests\Tour\FamilyTour;

use App\Models\Tour\FamilyTour;

/**
 * Class FamilyTourDeleteRequest
 *
 * @package App\Http\Requests\Tour\FamilyTour
 */
class FamilyTourDeleteRequest extends \App\Http\Requests\AbstractApiRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()
                    ->can('destroy', FamilyTour::class);
    }
}
