<?php

namespace App\Http\Requests\Tour\FamilyTour;

use App\Http\Requests\AbstractApiRequest;
use App\Models\Tour\FamilyTour;

/**
 * Class IndexAttachmentRequest
 *
 * @package App\Http\Requests\Attachments
 */
class FamilyTourIndexRequest extends AbstractApiRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()
                    ->can('index', FamilyTour::class);
    }
}
