<?php

namespace App\Http\Requests\Enderecos;

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
            'cep' => 'max:8',
            'logradouro' => 'string',
            'bairro' => 'string',
            'cidade' => 'string',
            'estado' => 'string|max:2'
        ];

        return $regras_resposta;
    }
}