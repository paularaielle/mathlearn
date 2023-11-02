<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AlunoController;
// use App\Http\Controllers\ProfessorController;
// use App\Http\Controllers\TurmaController;

// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout']);
// Route::post('refresh', [AuthController::class, 'refresh']);
// Route::post('me', [AuthController::class, 'me']);

// Route::apiResource('alunos', AlunoController::class);
// Route::apiResource('professores', ProfessorController::class);
// Route::apiResource('turmas', TurmaController::class);
