<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Scopes\AtivoScope;

class Turma extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nome',
        'turno', // 1, 2, 3
        'ativo',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AtivoScope);
    }

    public function professores(): BelongsToMany
    {
        return $this->belongsToMany(Professor::class, 'pessoa_turmas', 'turma_id', 'user_id');
    }

    public function totalAlunos()
    {
        return Aluno::whereIn('id', PessoaTurma::where('turma_id', $this->id)->pluck('user_id')->all())->count();
    }

    public function alunos () {
        return Aluno::whereIn('id', PessoaTurma::where('turma_id', $this->id)->pluck('user_id')->all())
            ->orderBy('pontuacao', 'desc')
            ->get();
    }

    public function delete() {
        return false;
    }
}
