<?php

namespace App\Services\Tarefas;

use App\DTO\Padrao\ResponseDTO;
use App\Repositories\TarefasRepository;
use App\Services\PadraoService;

class ExcluirService extends PadraoService
{
    private TarefasRepository $tarefas_repository;
    protected string $mensagem_nao_encontrada = 'Tarefas não foram excluídas. Tente novamente.';

    public function __construct(TarefasRepository $tarefas_repository)
    {
        parent::__construct();
        $this->tarefas_repository = $tarefas_repository;
    }
    
    public function excluir($id): ResponseDTO
    {
        try {
            $resposta_db = $this->tarefas_repository->excluir_db($id);
            $resposta = $this->montar_resposta($resposta_db, null, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta([]);
        }
    }
}