<?php

namespace App\DTO\Enderecos;

use App\DTO\Padrao\RequestDTO;

class AtualizarDTO extends RequestDTO
{
    public function __construct($dados)
    {
        $chaves_esperadas = [
            'cep',
            'logradouro',
            'bairro',
            'cidade',
            'estado',
        ];

        $chaves_nao_esperadas = array_diff(array_keys($dados), $chaves_esperadas);

        $this->retorno_padrao_dto($chaves_nao_esperadas);
    }
}
