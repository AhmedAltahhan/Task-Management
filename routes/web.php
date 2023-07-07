<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProjectController;
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
Route::prefix('AddTask')->group(function () {
    Route::get('/', [ProjectController::class ,'show_add_task'])->name('show_task');
    Route::post('/', [ProjectController::class ,'add_task'])->name('task');
});

Route::get('/project',[ProjectController::class,'search']);
