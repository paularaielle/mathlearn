<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlunoResposta;

class TabuadaFormPost extends Component
{
    public $m = 0;
    public $h = 0;
    public $s = 0;
    public $tempo;
    // Resposta vai guardar todos os dados antes de salvar
    public $respostas = [];
    public $tabuada;
    public $operacao;
    public $questoes = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
    public $operador = 1;
    // Form
    public $tabuada_id, $operacao_id, $resposta;

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
        $user = auth()->user();

        $this->respostas[$this->operador] = [
            'operacao_id' => $this->operacao_id,
            'tabuada_id' => $this->tabuada_id,
            'aluno_id' => $user->id,
            'resultado' => $this->resposta,
            'acerto' => $this->operacao_id,
            'tempo' => $this->tempo,
            'formular' => "teste",
            'operador' => $this->operador,
        ];

        $this->operador = $this->operador + 1;

        if ( $this->operador == 5) {
            dd($this->respostas);
        }
    }

    // Dados a serem salvos
    // [
    //     'operacao_id',
    //     'tabuada_id',
    //     'aluno_id', // user_id -> Aluno
    //     'resultado',
    //     'acerto', // true OR false (default: false)
    //     'tempo',
    //     'formular',
    //     'operador'
    // ];
    public function save()
    {
        // $post = Post::create([
        //     'title' => $this->title
        // ]);

        // return redirect()->to('/posts')
        //      ->with('status', 'Post created!');
    }
    public function render()
    {
        return view('livewire.tabuada-form-post');
    }
}
