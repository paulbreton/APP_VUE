<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;
use App\Managers\Admin\RolesManager;

class RolesController extends AbstractApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(RolesManager $rolesManager)
    {
       return $this->respond($rolesManager->getAll());
    }
}
