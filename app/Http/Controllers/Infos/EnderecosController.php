<?php

namespace App\Http\Controllers\Infos;

use Illuminate\Http\Request;
use App\DTO\Padrao\ResponseDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Enderecos\ConsultarService;
use App\Services\Enderecos\AtualizarService;

class EnderecosController extends Controller
{
    private ConsultarService $consultar_service;
    private AtualizarService $atualizar_service;
    private ResponseDTO $resposta_dto;

    public function __construct(
        ConsultarService $consultar_service,
        AtualizarService $atualizar_service
    ) {
        parent::__construct();
        $this->resposta_dto = new ResponseDTO();
        $this->consultar_service = $consultar_service;
        $this->atualizar_service = $atualizar_service;
    }

    public function consultar(): JsonResponse
    {
        $this->resposta_dto = $this->consultar_service->consultar();
        return $this->resposta($this->resposta_dto);
    }

    public function atualizar(Request $request): JsonResponse
    {
        $this->resposta_dto = $this->atualizar_service->atualizar($request->all());
        return $this->resposta($this->resposta_dto);
    }
}