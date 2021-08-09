<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/project', [ProjectController::class, 'index'])->name('project.index');

Route::get('/project/create', [ProjectController::class, 'new'])->name('project.new');
Route::get('/project/{id}', [ProjectController::class, 'edit'])->name('project.edit')->where(['id' => '[0-9]+']);
Route::get('/project/{id}/show', [ProjectController::class, 'show'])->name('project.show')->where(['id' => '[0-9]+']);

Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update')->where(['id' => '[0-9]+']);
Route::delete('/project/{id}', [ProjectController::class, 'delete'])->name('project.delete')->where(['id' => '[0-9]+']);

Route::get('/project/{id_project}/task/create', [TaskController::class, 'new'])->name('task.new')->where(['id_project' => '[0-9]+']);
Route::get('/project/{id_project}/task/{id}', [TaskController::class, 'edit'])->name('task.edit')->where(['id_project' => '[0-9]+', 'id' => '[0-9]+' ]);

Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update')->where(['id' => '[0-9]+']);
Route::delete('/task/{id}', [TaskController::class, 'delete'])->name('task.delete')->where(['id' => '[0-9]+']);

