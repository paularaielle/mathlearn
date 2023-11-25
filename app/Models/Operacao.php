<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'operacoes';

    protected $fillable = [
        'nome',
        'simbolo', // 1, 2, 3
        'peso_ponto',
        'imagem',
        'icon',
    ];

    public function img(String $w = '80px')
    {
        return "<img src='$this->image' title='Operacao: $this->nome' width='$w' />";
    }

    public function isSub()
    {
        return $this->simbolo == '-';
    }

    public function isDiv()
    {
        return $this->simbolo == '/';
    }
}
