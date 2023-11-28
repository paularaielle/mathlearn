<?php
namespace App\Models;

use App\Models\Scopes\AlunoScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aluno extends \App\Models\User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope(new AlunoScope);
    }

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class, 'pessoa_turmas', 'user_id', 'turma_id');
    }

    public function delete() {

        if (AlunoResposta::where('aluno_id', $this->id)->count()) {
            return false;
        }

        return parent::delete();
    }

    public function totalResposta($operacaoId = null, $acerto=null)
    {
        $query = AlunoResposta::where('aluno_id', $this->id);
        if ($operacaoId) $query->where('operacao_id', $operacaoId);
        if ($acerto !== null) {
            if ($acerto === false) $query->where('acerto', false);
            if ($acerto === true) $query->where('acerto', true);
        }

        return $query->count();
    }

    public function acertos($operacaoId = null)
    {
        // $query = AlunoResposta::where('aluno_id', $this->id)->where('acerto', true);
        // if ($operacaoId) $query->where('operacao_id', $operacaoId);
        return $this->totalResposta($operacaoId, true);
    }

    public function erros($operacaoId = null)
    {
        // $query = AlunoResposta::where('aluno_id', $this->id)->where('acerto', false);
        // if ($operacaoId) $query->where('operacao_id', $operacaoId);

        // return $query->count();
        return $this->totalResposta($operacaoId, false);
    }

    // Aproveitamento em %
    public function aproveitamento ($operacaoId)
    {
        // $total = AlunoResposta::where('operacao_id', $operacaoId)->where('aluno_id', $this->id)->count();
        $total = $this->totalResposta($operacaoId);
        $acertos = $this->acertos($operacaoId);

        if ($acertos == 0) return 0;

        return ($acertos * 100) / $total;
    }
}
