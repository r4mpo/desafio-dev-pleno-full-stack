<?php

namespace App\DTO\Tarefas;

use App\DTO\Default\RequestDTO;

class AtualizarDTO extends RequestDTO
{
    public function __construct($dados)
    {
        $chaves_esperadas = [
            'titulo',
            'status',
        ];

        $chaves_nao_esperadas = array_diff(array_keys($dados), $chaves_esperadas);

        $this->retorno_padrao_dto($chaves_nao_esperadas);
    }
}
