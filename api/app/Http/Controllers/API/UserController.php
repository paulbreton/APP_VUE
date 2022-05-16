<?php

namespace App\Http\Controllers\API;

use App\Filters\UserFilters;
use App\Http\Controllers\AbstractApiController;
use App\Http\Requests\userUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Roles;
use App\Models\User;
use App\Managers\UserManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends AbstractApiController
{
    /**
     * @param UserManager $userManager
     * @return AnonymousResourceCollection
     */
    public function index(UserManager $userManager)
    {
        return UserResource::collection($userManager->getAll());
    }
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user) {
        return response(UserResource::make($user));
    }

    /**
     * @param userUpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(userUpdateRequest $request, User $user) {
        $filter = new UserFilters();
        if($request->input('role_id')) {
            $filter->role_id = $request->input('role_id');
        }

        if (Roles::findOrFail($filter->role_id)) {
            $user->update(['role_id' => $filter->role_id]);
        }

        return $this->respondEmpty();
    }

    /**
     * @param int $id
     * @param UserManager $userManager
     * @return JsonResponse
     */
    public function destroy(int $id, UserManager $userManager)
    {
        $deleteUser = $userManager->delete($id);

        if($deleteUser === 0) {
            throw new NotFoundHttpException("Can not delete user with id $id");
        }

        return $this->respondEmpty();
    }
}
