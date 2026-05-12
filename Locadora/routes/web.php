<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocadoraController;

// Rota para abrir a página e para cadastrar
Route::get('/', [LocadoraController::class, 'index'])->name('locadora.index');
Route::post('/cadastrar', [LocadoraController::class, 'store'])->name('locadora.store');