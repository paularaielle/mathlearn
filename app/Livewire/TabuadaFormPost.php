<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\AlunoResposta;

class TabuadaFormPost extends Component
{
    use LivewireAlert;

    public $m = 0;
    public $h = 0;
    public $s = 0;
    // Resposta vai guardar todos os dados antes de salvar
    public $enableSave = false;
    public $respostas = [];
    public $erros = [];
    public $acertos = [];
    public $operador = 1;
    public $questao = 1;
    // Form
    public $tabuada, $operacao, $resposta, $tempo;

    public function mount($tabuada, $operacao)
    {
        $this->tabuada = $tabuada;
        $this->operacao = $operacao;
    }

    public function cronStart () {
        if ($this->h == 23 && $this->m == 59) {
            $this->h = 0;
            $this->m = 0;
            $this->s = 0;
        }
        // Segundos
        if ($this->s == 60) {

            if ($this->m == 60) {
                $this->h = $this->h + 1;
                $this->m = 0;
                $this->s = 0;
            } else {
                $this->m = $this->m + 1;
                $this->s = 0;
            }
        } else {
            $this->s = $this->s + 1;
        }
        $str = "";
        if ($this->h) $str .= str_pad("$this->h:", 2, "0", STR_PAD_LEFT);
        $str .= str_pad("$this->m:", 2, "0", STR_PAD_LEFT);
        $str .= str_pad("$this->s", 2, "0", STR_PAD_LEFT);

        $this->tempo = $str;
    }

    public function responder()
    {
        $acertou = $this->acertou($this->operador);
        $user = auth()->user();

        $this->respostas[$this->operador] = [
            'operacao_id' => $this->operacao->id,
            'tabuada_id' => $this->tabuada->id,
            'aluno_id' => "$user->id",
            'resposta' => $this->resposta,
            'acerto' => $acertou,
            'tempo' => $this->tempo,
            'formular' => $this->setFormula($this->operador),
            'operador' => $this->operador,
        ];

        if ($acertou) {
            $this->alert('success', 'Parabéns, você acertou', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', motivacionaisErro(), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }

        $this->reCalcular();
    }

    // apenas bloqueia o submit do formulário
    public function saveBlockDefault(){}

    public function setFormula($operador)
    {
        $numero = $this->tabuada->numero;
        $simbolo = $this->operacao->simbolo;

        return "$operador $simbolo $numero = $this->resposta";
    }

    // testa se o Aluno acertou a resposta
    public function acertou($operador)
    {
        $resultado = calc($operador, $this->tabuada->numero, $this->operacao->simbolo);

        return $resultado == $this->resposta;
    }

    public function save()
    {
        foreach ($this->respostas as $resposta) {
            AlunoResposta::create($resposta);
        }

        session()->flash('success', 'Parabéns, você terminou sua lição');

        return $this->redirect('/dashboard');
    }

    /**
     * Reseta e Recalcula variantes
     */
    public function reCalcular()
    {
        $this->h = 0;
        $this->m = 0;
        $this->s = 0;
        $this->tempo = "0:00";
        $this->resposta = null;

        // Aumenta Operador
        if ($this->operador <= 10) {
            $this->operador = $this->operador + 1;
            $this->questao = $this->questao + 1;
        }

        if (isset($this->respostas[10])) {
            $this->operador = 10;
            $this->questao = 10;
        }

        if (isset($this->respostas[10])) $this->enableSave = true;
    }

    public function render()
    {
        return view('livewire.tabuada-form-post');
    }
}
