<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'api'], function()
{
    // API de User (Usuário)
    Route::get('/users/{id?}', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // API de State (Estado)
    Route::get('/states/{id?}', [StateController::class, 'index']);
    Route::post('/states', [StateController::class, 'store']);
    Route::put('/states/{id}', [StateController::class, 'update']);
    Route::delete('/states/{id}', [StateController::class, 'destroy']);

    // API de City (Cidade)
    Route::get('/cities/{id?}', [CityController::class, 'index']);
    Route::post('/cities', [CityController::class, 'store']);
    Route::put('/cities/{id}', [CityController::class, 'update']);
    Route::delete('/cities/{id}', [CityController::class, 'destroy']);

    // API de Street (Rua)
    Route::get('/streets/{id?}', [StreetController::class, 'index']);
    Route::post('/streets', [StreetController::class, 'store']);
    Route::put('/streets/{id}', [StreetController::class, 'update']);
    Route::delete('/streets/{id}', [StreetController::class, 'destroy']);
});
