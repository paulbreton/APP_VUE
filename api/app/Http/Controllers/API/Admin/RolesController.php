<?php

namespace App\Http\Controllers\API\Admin;

use App\Filters\Admin\RolesFilter;
use App\Http\Controllers\API\AbstractApiController;
use App\Models\Roles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RolesRequest;
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
