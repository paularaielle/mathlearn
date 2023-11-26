<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacao;
use App\Models\Tabuada;

class PontuacaoController extends Controller
{
    // public function __construct () {
    //     $user = request()->user();
    //     if (!$user->isAluno() || !$user) redirect()->route('dashboard');
    // }
    public function create(string $operacaoId, $tabuadaId)
    {
        $operacao = Operacao::find($operacaoId);
        $tabuada = Tabuada::find($tabuadaId);

        return view('pontuacao.create')
            ->with('operacao', $operacao)
            ->with('tabuada', $tabuada);
    }
}
