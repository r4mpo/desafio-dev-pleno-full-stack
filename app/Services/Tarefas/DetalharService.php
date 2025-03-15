<?php

namespace App\Services\Tarefas;

use App\DTO\Default\ResponseDTO;
use App\Repositories\TarefasRepository;
use App\Services\DefaultService;

class DetalharService extends DefaultService
{
    protected TarefasRepository $tarefas_repository;
    protected string $mensagem_nao_encontrada = 'Tarefas não foram encontradas. Tente novamente.';

    public function __construct(TarefasRepository $tarefas_repository)
    {
        parent::__construct();
        $this->tarefas_repository = $tarefas_repository;
    }
    
    public function detalhar($id): ResponseDTO
    {
        try {
            $resposta_db = $this->tarefas_repository->buscar_db($id);
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