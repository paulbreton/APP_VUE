<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AbstractApiRequest
 *
 * @package App\Http\Requests
 */
abstract class AbstractApiRequest extends FormRequest
{
    /**
     * Obtenir les règles de validation qui s'appliquent à la requête.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Déterminer si l'utilisateur est autorisé à faire cette requête.
     * Par défaut, on ferme l'accès !
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * @return string|null
     * @throws AuthorizationException
     */
    protected function getRouteName(): ?string
    {
        $route = $this->route();
        if ($route === null) {
            throw new AuthorizationException();
        }

        return $route->getName();
    }
}
