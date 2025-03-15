<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\DTO\Padrao\ResponseDTO;

class LoggingHelper
{
    public static function log_geral($requisicao, ResponseDTO $response): void
    {
        Log::info(
            "Requisição:",
            [
                'USUARIO' => Auth::id(),
                'METODO' => request()->method(),
                'CAMINHO_REQUISICAO' => request()->path(),
                'REQUISICAO' => [
                    'request' => request()
                ],
                'RESPOSTA' => [
                    'resposta' => $response->get_retorno(),
                    'codigo_resposta' => $response->get_codigo_retorno(),
                    'status' => $response->get_status_code()
                ]
            ]
        );
    }
}