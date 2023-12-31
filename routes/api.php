<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('projects',ProjectController::class);
Route::get('/project',[ProjectController::class,'search']);

Route::apiResource('tasks',TaskController::class);
Route::get('/task',[TaskController::class,'search']);
Route::get('/tag',[TaskController::class,'filter']);

