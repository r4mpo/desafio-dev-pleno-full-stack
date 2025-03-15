<?php

namespace App\Services\Tarefas;

use App\DTO\Default\ResponseDTO;
use App\Repositories\TarefasRepository;
use App\Services\DefaultService;
use App\ValueObjects\Tarefas\RegistrarVO;

class RegistrarService extends DefaultService
{
    private TarefasRepository $tarefas_repository;
    protected string $mensagem_nao_encontrada = 'Tarefas não foram registradas. Tente novamente.';

    public function __construct(TarefasRepository $tarefas_repository)
    {
        parent::__construct();
        $this->tarefas_repository = $tarefas_repository;
    }
    
    public function registrar($requisicao): ResponseDTO
    {
        try {
            new RegistrarVO($requisicao);
            $resposta_db = $this->tarefas_repository->registrar_db($requisicao);
            $resposta = $this->montar_resposta($resposta_db, $resposta_db, $this->mensagem_nao_encontrada);
            $this->definir_dados_resposta($resposta);
        } catch (\Exception $e) {
            $this->lidar_com_excecao($e);
        } finally {
            return $this->dados_resposta($requisicao);
        }
    }
}