<?php

namespace App\Swagger\Enderecos;

/**
 * @OA\Post(
 *     path="/enderecos/atualizar",
 *     summary="Atualizar endereço do usuário",
 *     tags={"Endereços"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="cep", type="string", example="13183135"),
 *             @OA\Property(property="logradouro", type="string", example="Rua Capitão Gancho"),
 *             @OA\Property(property="bairro", type="string", example="Campos Marítimos"),
 *             @OA\Property(property="cidade", type="string", example="Vila Velha"),
 *             @OA\Property(property="estado", type="string", example="SP")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Endereço atualizado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="string", example="Sucesso na operação."),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     )
 * )
 */
class AtualizarResponse
{
}