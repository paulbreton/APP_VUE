<?php

namespace App\Http\Requests\Tour\PlannedTour;

use App\Enums\Roles\RoleEnum;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PlannedTourBulkDeleteRequest
 *
 * @package App\Http\Requests\Tour\PlannedTour
 */
class PlannedTourBulkDeleteRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        /**
         * @var User $user
         */
        $user = $this->user();

        return $user->hasRolesAmong([RoleEnum::CALENDAR_WRITER]);
    }

    /**
     * Différents paramètres attendus et leurs règles de validation
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'integer',
            'reason' => 'required|string',
        ];
    }
}
