<?php

namespace App\Http\Requests\Tour\FamilyTour;

use App\Http\Requests\AbstractApiRequest;
use App\Models\Tour\FamilyTour;

/**
 * Class FamilyTourStoreRequest
 *
 * @package App\Http\Requests\Tour\FamilyTour
 */
class FamilyTourStoreRequest extends AbstractApiRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()
                    ->can('store', FamilyTour::class);
    }

    /**
     * Différents paramètres attendus et leurs règles de validation
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'wording' => 'required|string',
        ];
    }
}
