<?php

namespace App\Http\Requests\GuestRole;

use App\Enums\Roles\RoleEnum;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class GuestRoleUpdateRequest extends FormRequest
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

        return $user->hasRolesAmong([
            RoleEnum::ADMIN,
            RoleEnum::TOUR_CONFIG,
            RoleEnum::CALENDAR_READER,
            RoleEnum::CALENDAR_WRITER,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'required',
                'string',
            ],
        ];
    }
}
