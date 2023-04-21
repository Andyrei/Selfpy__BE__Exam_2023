<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\UserExercisesController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
    Route::controller(AuthController::class)->group(function () {
        Route::post('/auth/register', 'createUser');
        Route::post('/auth/login', 'login');
    });
});







Route::get('/exercises', [ExercisesController::class, 'index'] );
Route::get('/userexercises',[UserExercisesController::class, 'index']);
