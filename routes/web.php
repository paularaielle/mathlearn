<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\OperacaoController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth'])->group(function () {

    // Dashboard modulado
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Administrador
    Route::resource('turma', TurmaController::class);
    Route::resource('professor', ProfessorController::class);
    Route::resource('aluno', AlunoController::class);
    Route::resource('operacao', OperacaoController::class);

    // Professor

    // Aluno
});

