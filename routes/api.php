<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\ScoreAPIController;
use App\Http\Controllers\API\VideoAPIController;
use App\Http\Controllers\API\ScheduleAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthAPIController::class, 'login']);
Route::post('/register', [AuthAPIController::class, 'register']);
Route::post('/logout', [AuthAPIController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/news', [NewsAPIController::class, 'getAllNews']);
Route::get('/news/{id}', [NewsAPIController::class, 'news']);
Route::get('/highlights', [VideoAPIController::class, 'getAllHighlights']);
Route::get('/highlight/{id}', [VideoAPIController::class, 'highlight']);
Route::get('/liked-videos/{id}', [VideoAPIController::class, 'likedVideos']);
Route::get('/fixtures', [ScheduleAPIController::class, 'getAllSchedule']);
Route::get('/scores', [ScoreAPIController::class, 'getAllScore']);
