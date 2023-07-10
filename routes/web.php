<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Web.Layouts.ContentMaster');
});

Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

Route::get('/project',[ProjectController::class,'search']);

Route::get('/task',[TaskController::class,'search']);
Route::get('/tag',[TaskController::class,'filter']);
