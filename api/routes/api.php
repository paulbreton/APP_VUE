<?php

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\ParticipateController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\Admin\RolesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')
    ->get('/user', function(Request $request) {
        return UserResource::make($request->user());
    });
Route::middleware(['auth:sanctum'])
     ->group(function() {
         Route::get('/users', [
             UserController::class,
             'index',
         ]);
         Route::get('/user/{user}', [
             UserController::class,
             'show',
         ]);
         Route::delete('/user/{user}', [
            UserController::class,
            'destroy',
        ]);
         Route::put('/user/{user}', [
             UserController::class,
             'update',
         ]);
     });

Route::apiResource('roles', RolesController::class);
Route::apiResource('game', GameController::class);

Route::delete('game/{game}/participate/{user}', [ParticipateController::class, 'destroy']);
Route::post('game/{game}/participate/{user}', [ParticipateController::class, 'store']);
