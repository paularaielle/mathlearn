<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'nome' => 'required',
            'nickname' => 'required|unique:users,nickname',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
