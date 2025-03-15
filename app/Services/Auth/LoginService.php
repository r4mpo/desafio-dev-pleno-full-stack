<?php

namespace App\Services\Auth;

use App\DTO\Padrao\ResponseDTO;
use App\Services\PadraoService;
use App\ValueObjects\Auth\LoginAuthVO;

class LoginService extends PadraoService
{
    protected string $mensagem_nao_encontrada = 'Credenciais e/ou sessões inválidas. Tente novamente.';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($requisicao): ResponseDTO
    {
        try {
            new LoginAuthVO($requisicao);
            $resposta_db = $this->valida_tokens_credenciais($requisicao);
            $resposta = $this->montar_resposta($resposta_db, $resposta_db, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta($requisicao);
        }
    }

    private function valida_tokens_credenciais($credenciais)
    {
        if (!$token = auth()->attempt($credenciais)) {
            return false;
        }

        return $this->gerar_token($token);
    }

    private function gerar_token($token): array
    {
        return [
            'token' => $token,
            'id_usuario' => auth()->id(),
            'tipo_token' => 'bearer',
            'expira_em' => auth()->factory()->getTTL() * 60
        ];
    }
}