<?php

namespace App\Swagger\Tarefas;

/**
 * @OA\Put(
 *     path="/tarefas/{id}",
 *     summary="Atualizar uma tarefa existente",
 *     tags={"Tarefas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID da tarefa a ser atualizada",
 *         required=true,
 *         @OA\Schema(type="string", example="2")
 *     ),
 *     @OA\RequestBody(
 *         required=false,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="titulo", type="string", maxLength=30, example="Teste API Atualizado"),
 *                 @OA\Property(property="status", type="boolean", example=true)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=111,
 *         description="Tarefa atualizada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="string", example="Sucesso na operação."),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     ),
 *     @OA\Response(
 *         response=333,
 *         description="Erro de validação nos campos",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="array",
 *                 @OA\Items(type="string", example="O campo status é obrigatório.")
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=333)
 *         )
 *     )
 * )
 */

class AtualizarResponse
{
}