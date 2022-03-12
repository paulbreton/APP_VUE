<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RolesRequest
 *
 * @package App\Http\Requests\Admin
 */
class RolesRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Différents paramètres attendus et leurs règles de validation
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'label' => 'string|sometimes|required',
            'id' => 'int|sometimes|required',
        ];
    }
}