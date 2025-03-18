<?php

namespace App\Services\enderecos;

use App\DTO\Padrao\ResponseDTO;
use App\Repositories\EnderecosRepository;
use App\Services\PadraoService;

class ConsultarService extends PadraoService
{
    protected EnderecosRepository $enderecos_repository;
    protected string $mensagem_nao_encontrada = 'Endereços não foram encontrados. Tente novamente.';

    public function __construct(EnderecosRepository $enderecos_repository)
    {
        parent::__construct();
        $this->enderecos_repository = $enderecos_repository;
    }

    public function consultar(): ResponseDTO
    {
        try {
            $resposta_db = $this->enderecos_repository->consultar_db();
            $resposta_db = empty($resposta_db) ? false : $resposta_db;
            $resposta = $this->montar_resposta($resposta_db, $resposta_db, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta([]);
        }
    }
}