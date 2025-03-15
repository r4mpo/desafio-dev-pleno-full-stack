<?php

namespace App\Services\Tarefas;

use App\DTO\Default\ResponseDTO;
use App\Repositories\TarefasRepository;
use App\Services\DefaultService;
use App\ValueObjects\Tarefas\AtualizarVO;

class AtualizarService extends DefaultService
{
    private TarefasRepository $tarefas_repository;
    protected string $mensagem_nao_encontrada = 'Tarefas não foram atualizadas. Tente novamente.';

    public function __construct(TarefasRepository $tarefas_repository)
    {
        parent::__construct();
        $this->tarefas_repository = $tarefas_repository;
    }
    
    public function atualizar($requisicao, $id): ResponseDTO
    {
        try {
            new AtualizarVO($requisicao);
            $resposta_db = $this->tarefas_repository->atualizar_db($requisicao, $id);
            $resposta = $this->montar_resposta($resposta_db, null, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta($requisicao);
        }
    }
}