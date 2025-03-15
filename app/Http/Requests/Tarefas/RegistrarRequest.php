<?php

namespace App\Http\Requests\Tarefas;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $regras_resposta = [
            'titulo' => 'required|string|max:30',
            'status' => 'required|boolean',
        ];

        return $regras_resposta;
    }
}