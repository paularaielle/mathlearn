<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\AlunoResposta;
use Illuminate\Support\Facades\DB;

class DivisaoFormPost extends Component
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
    public $user;
    // Form
    public $tabuada, $operacao, $resposta, $tempo;

    public function mount($tabuada, $operacao)
    {
        $this->user = auth()->user();
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
        // Ordenador
        $acertou = $this->acertou($this->operador);

        $this->respostas[$this->operador] = [
            'operacao_id' => $this->operacao->id,
            'tabuada_id' => $this->tabuada->id,
            'aluno_id' => $this->user->id,
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
        $data = $this->ordenar($operador, $this->operacao->simbolo, $this->tabuada->numero);

        return $data['valor1'] . $this->operacao->simbolo . $data['valor2'] . " = " . $this->resposta;
    }

    // testa se o Aluno acertou a resposta
    public function acertou($operador)
    {
        $data = $this->ordenar($operador, $this->operacao->simbolo, $this->tabuada->numero);

        $resultado = calc($data['valor1'], $data['valor2'], $data['simbolo']);

        return $resultado == $this->resposta;
    }

    public function save()
    {
        DB::beginTransaction();

        $pontuacao = $this->user->pontuacao;
        foreach ($this->respostas as $resposta) {
            AlunoResposta::create($resposta);
            if ($resposta['acerto']) $pontuacao = $pontuacao + 5;
        }

        if ($this->user->update([ 'pontuacao' => $pontuacao ])) {
            DB::commit();
            session()->flash('success', 'Parabéns, você terminou sua lição');
        } else {
            DB::rollBack();
            session()->flash('danger', 'Opa... Algo deu errado ao enviar suas respostas!');
        }

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

    public function ordenar ($numero, $simbolo, $tabuada)
    {
        $valor1 = 0;
        $valor2 = 0;
        if ($tabuada == 1) {
            $valor1 = $numero;
            $valor2 = $tabuada;
        }

        if ($tabuada >= 2) {

            if ($numero == 1) {
                $valor1 = $tabuada;
                $valor2 = $tabuada;
            } else {
                $valor1 = $tabuada * $numero;
                $valor2 = $tabuada;
            }
        }

        return [
            'valor1' => $valor1,
            'simbolo' => $simbolo,
            'valor2' => $valor2,
        ];
    }

    public function render()
    {
        return view('livewire.divisao-form-post');
    }
}
