<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpercaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'nome' => 'required',
            'simbolo' => 'required',
        ];
    }
}
