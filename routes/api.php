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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);





Route::controller(ExercisesController::class)->group(function() {

    // SHOW ALL
    Route::get('/exercises',  'index' );

    // CREATE EXERCISE
    Route::post("/exercises/create", 'store');

    // GET BY ID
    Route::get('/exercises/{id}', 'show');

    // DESTROY
    Route::delete('/exercises/destroy/{id}', 'destroy');
});

Route::controller(UserExercisesController::class)->group(function() {

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/userexercises','index');
        Route::get('/userexercises/{id}', 'show');
        Route::post('/userexercises/create', 'store');
        Route::patch('/userexercises/update/{id}', 'update');
        Route::delete('/userexercises/delete/{id}', 'destroy');
    });
});
