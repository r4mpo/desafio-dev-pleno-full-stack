<?php

namespace App\Http\Requests\Tarefas;

use Illuminate\Foundation\Http\FormRequest;

class AtualizarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $regras_resposta = [
            'titulo' => 'string|max:30',
            'status' => 'boolean',
        ];

        return $regras_resposta;
    }
}