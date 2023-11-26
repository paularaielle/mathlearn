<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacao;
use App\Models\Tabuada;

class TabuadaController extends Controller
{
    // public function __construct () {
    //     $user = auth()->user();

    //     if (!$user->isAluno()) redirect()->route('dashboard');
    // }

    public function index(string $operacaoId)
    {
        $operacao = Operacao::find($operacaoId);
        $tabuadas = Tabuada::all();

        return view('tabuada.index')
            ->with('operacao', $operacao)
            ->with('tabuadas', $tabuadas);
    }
}
