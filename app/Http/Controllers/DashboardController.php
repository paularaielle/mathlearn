<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacao;
use App\Models\Turma;

class DashboardController extends Controller
{
    public function home () {

        $user = auth()->user();
        $pathview = $this->getView($user);

        return view($pathview)
            ->with('user', $user)
            ->with('operacoes', Operacao::all())
            ->with('turmas', $user->getTurmas());
    }

    private function getView($user) {
        $pathview = 'home';

        if ($user->isAdmin()) {
            $pathview = 'dashboard.administrador';
        }

        if ($user->isProfessor()) {
            $pathview = 'dashboard.professor';
        }

        if ($user->isAluno()) {
            $pathview = 'dashboard.aluno';
        }

        return $pathview;
     }
}
