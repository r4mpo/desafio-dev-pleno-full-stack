<?php

namespace App\Services\Enderecos;

use App\DTO\Padrao\ResponseDTO;
use App\Repositories\EnderecosRepository;
use App\Services\PadraoService;
use App\ValueObjects\Enderecos\AtualizarVO;

class AtualizarService extends PadraoService
{
    private EnderecosRepository $enderecos_repository;
    protected string $mensagem_nao_encontrada = 'Endereços não foram atualizados. Tente novamente.';

    public function __construct(EnderecosRepository $enderecos_repository)
    {
        parent::__construct();
        $this->enderecos_repository = $enderecos_repository;
    }
    
    public function atualizar($requisicao): ResponseDTO
    {
        try {
            new AtualizarVO($requisicao);
            $resposta_db = $this->enderecos_repository->atualizar_db($requisicao);
            $resposta = $this->montar_resposta($resposta_db, null, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta($requisicao);
        }
    }
}