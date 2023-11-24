<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoResposta extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'aluno_respostas';

    protected $fillable = [
        'operacao_id',
        'tabuada_id',
        'aluno_id', // user_id -> Aluno
        'resultado',
        'acerto', // true OR false (default: false)
        'tempo',
        'formular',
        'operador'
    ];
}
