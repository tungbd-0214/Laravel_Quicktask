<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});
Route::middleware(['admin'])->group(function () {
	Route::get('/users', [UserController::class, 'index'])
	    		->name('users.index');
	Route::get('/users/create', [UserController::class, 'create'])
				->name('users.create');
	Route::get('/users/{user}/edit', [UserController::class, 'edit'])
				->name('users.edit');
	Route::get('/users/{user}', [UserController::class, 'show'])
				->name('users.show');
	Route::post('/users', [UserController::class, 'store'])
				->name('users.store');
	Route::put('/users/{user}', [UserController::class, 'update'])
				->name('users.update');
	Route::delete('/users/{user}', [UserController::class, 'delete'])
				->name('users.delete');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
