<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class GameStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|required',
            'description' => 'nullable|string',
            'terrain' => 'string|required',
            'nb_players' => 'int|gt:0|sometimes|required',
            'visibility' => 'boolean|required',
            'draft' => 'boolean|sometimes|required',
            'organisateur' => 'int|required',
            'date' => 'required|date|after:tomorrow'
        ];
    }
}
