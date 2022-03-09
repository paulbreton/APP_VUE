<?php

namespace App\Http\Requests\Review;

use App\Enums\Roles\RoleEnum;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateConfiguratedDailyReviewRequest
 *
 * @package App\Http\Requests\Review
 */
class CreateConfiguratedDailyReviewRequest extends FormRequest
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
            'familyTourIds' => 'required|array',
            'familyTourIds.*' => 'integer',
            'dateStart' => 'date_format:Y-m-d|after_or_equal:today',
        ];
    }
}
