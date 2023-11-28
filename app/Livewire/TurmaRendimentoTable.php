<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlunoResposta;
use App\Models\Operacao;

class TurmaRendimentoTable extends Component
{
    public $active;
    public $turmas, $operadores, $turma;
    public $alunos = [];

    public function mount($turmas)
    {
        $this->turmas = $turmas;
        $this->operadores = Operacao::orderBy('nome', 'asc')->get();
        $this->init();
    }

    public function init()
    {
        if (count($this->turmas)) {
            $this->turma = $this->turmas[0];
            $this->active = $this->turma->id;
            $this->alunos = $this->turma->alunos();
        }
    }

    // public function aproveitamento()
    // {
    //     AlunoResposta::where('')
    // }

    public function click($turmaId)
    {
        $this->active = $turmaId;

        foreach ($this->turmas as $m) {
            if ($m->id == $turmaId) $this->turma = $m;
        }

        if ($this->turma) $this->alunos = $this->turma->alunos();
    }

    public function render()
    {
        return view('livewire.turma-rendimento-table');
    }
}
