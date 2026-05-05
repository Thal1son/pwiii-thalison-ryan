<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/departments/store', [TaskController::class, 'storeDepartment'])->name('departments.store');
Route::post('/tasks/store', [TaskController::class, 'storeTask'])->name('tasks.store');