<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\OperacaoController;
use App\Http\Controllers\TabuadaController;
use App\Http\Controllers\PontuacaoController;

use App\Http\Middleware\AlunoMiddleware;
use App\Http\Middleware\ProfessorMiddleware;
use App\Http\Middleware\AdministradorMiddleware;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [LoginController::class, 'index'])->name('login');

    // Dashboard modulado
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('perfil', [LoginController::class, 'perfil'])->name('perfil');
    Route::post('perfil', [LoginController::class, 'update'])->name('salvarPerfil');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Administrador
    Route::middleware([AdministradorMiddleware::class])->group(function () {
        Route::resource('turma', TurmaController::class);
        Route::resource('professor', ProfessorController::class);
        Route::resource('aluno', AlunoController::class);
        Route::resource('operacao', OperacaoController::class);
    });

    // Professor
    Route::middleware([ProfessorMiddleware::class])->group(function () {
        Route::get('turma-alunos/{turmaId}', [ProfessorController::class, 'alunosPorTurma'])->name('turma.alunos');
    });

    // Aluno
    Route::middleware([AlunoMiddleware::class])->group(function () {
        Route::get('tabuada/{id}', [TabuadaController::class, 'index'])->name('tabuada.index');
        Route::get('tabuada/{operacaoId}/pontuacao/{tabuadaId}', [PontuacaoController::class, 'create'])
            ->name('pontuacao.create');
    });
});

