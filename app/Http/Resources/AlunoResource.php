<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'nickname' => $this->nickname,
            'perfil' => $this->perfil,
            'email' => $this->email,
        ];
    }
}
