<?php

use App\Http\Controllers\TasksController;
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

Route::prefix('/tasks')->group(function () {
    Route::get('/', [TasksController::class, 'get_tasks']);
    Route::post('/', [TasksController::class, 'add_task']);
    Route::put('/done', [TasksController::class, 'done_task']);
    Route::delete('/', [TasksController::class, 'delete_task']);
});
