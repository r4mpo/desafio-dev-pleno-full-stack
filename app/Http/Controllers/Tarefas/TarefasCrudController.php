<?php

namespace App\Http\Controllers\Tarefas;

use Illuminate\Http\Request;
use App\Interfaces\crudTemplate;
use App\DTO\Default\ResponseDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Tarefas\ExcluirService;
use App\Services\Tarefas\DetalharService;
use App\Services\Tarefas\AtualizarService;
use App\Services\Tarefas\ConsultarService;
use App\Services\Tarefas\RegistrarService;

class TarefasCrudController extends Controller implements crudTemplate
{
    private ConsultarService $consultar_service;
    private RegistrarService $registrar_service;
    private DetalharService $detalhar_service;
    private AtualizarService $atualizar_service;
    private ExcluirService $excluir_service;
    private ResponseDTO $resposta_dto;

    public function __construct(
        ConsultarService $consultar_service,
        RegistrarService $registrar_service,
        DetalharService $detalhar_service,
        AtualizarService $atualizar_service,
        ExcluirService $excluir_service
    ) {
        parent::__construct();
        $this->resposta_dto = new ResponseDTO();
        $this->consultar_service = $consultar_service;
        $this->registrar_service = $registrar_service;
        $this->detalhar_service = $detalhar_service;
        $this->atualizar_service = $atualizar_service;
        $this->excluir_service = $excluir_service;
    }

    public function index(): JsonResponse
    {
        $this->resposta_dto = $this->consultar_service->consultar();
        return $this->resposta($this->resposta_dto);
    }

    public function store(Request $request): JsonResponse
    {
        $this->resposta_dto = $this->registrar_service->registrar($request->all());
        return $this->resposta($this->resposta_dto);
    }

    public function show(string $id): JsonResponse
    {
        $this->resposta_dto = $this->detalhar_service->detalhar($id);
        return $this->resposta($this->resposta_dto);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $this->resposta_dto = $this->atualizar_service->atualizar($request->all(), $id);
        return $this->resposta($this->resposta_dto);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->resposta_dto = $this->excluir_service->excluir($id);
        return $this->resposta($this->resposta_dto);
    }
}