<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Public endpoints
Route::get('/events',        [EventController::class, 'index']);
Route::get('/events/{event}',[EventController::class, 'show']);

// Protected endpoints (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/events/store',            [EventController::class, 'store']);
    Route::put('/events/update/{event}',     [EventController::class, 'update']);
    Route::delete('/events/delete/{event}',  [EventController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
