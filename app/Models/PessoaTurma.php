<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\AtivoScope;

class PessoaTurma extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'turma_id', // 1, 2, 3
        'ativo',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AtivoScope);
    }
}
