<?php

use App\Http\Controllers\Auth\AuthenticatedTokenController;
use App\Http\Controllers\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthenticatedTokenController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthenticatedTokenController::class, 'destroy']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(LessonController::class)->group(function () {
        Route::get('/lessons', 'index');
        Route::post('/lessons', 'store');
        Route::delete('/lessons/{lesson}', 'delete');
    });
});


