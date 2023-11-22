<?php
namespace App\Models;

use App\Models\Scopes\ProfessorScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Professor extends \App\Models\User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope(new ProfessorScope);
    }

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class, 'pessoa_turmas', 'user_id', 'turma_id');
    }
}
