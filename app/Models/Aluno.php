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

    public function acertos()
    {
        return AlunoResposta::where('aluno_id', $this->id)->where('acerto', true)->count();
    }

    public function erros()
    {
        return AlunoResposta::where('aluno_id', $this->id)->where('acerto', false)->count();
    }
}
