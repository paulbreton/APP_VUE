<?php

namespace App\Http\Requests\Review;

use App\Enums\Roles\RoleEnum;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ReadDailyReviewRequest
 *
 * @package App\Http\Requests\Review
 */
class ReadDailyReviewRequest extends FormRequest
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

        return $user->hasRolesAmong([RoleEnum::CALENDAR_READER]);
    }

    /**
     * Différents paramètres attendus et leurs règles de validation
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'start' => 'sometimes|required|date_format:Y-m-d',
            'end' => 'sometimes|required|date_format:Y-m-d|after_or_equal:start',

            'orderBy' => 'string|sometimes|required',
            'order' => 'string|in:asc,desc|sometimes|required',
            'page' => 'int|sometimes|required',
            'perPage' => 'integer|sometimes|required',
            'status' => 'string|sometimes|required',
            'type' => 'string|sometimes|required',
            'serviceId' => 'string|sometimes|required',
            'workshopIds' => 'array|sometimes|required',
            'workshopIds.*' => 'string|sometimes|required',
            'familyTourIds' => 'array|sometimes|required',
        ];
    }
}
