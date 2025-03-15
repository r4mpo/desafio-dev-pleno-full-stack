<?php

namespace App\Swagger\Tarefas;

/**
 * @OA\Delete(
 *     path="/tarefas/{id}",
 *     summary="Excluir uma tarefa existente",
 *     tags={"Tarefas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID da tarefa a ser excluída",
 *         required=true,
 *         @OA\Schema(type="string", example="2")
 *     ),
 *     @OA\Response(
 *         response=111,
 *         description="Tarefa excluída com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="string", example="Sucesso na operação."),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     ),
 *     @OA\Response(
 *         response=333,
 *         description="Erro de validação ou tarefa não encontrada",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="array",
 *                 @OA\Items(type="string", example="Tarefa não encontrada.")
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=333)
 *         )
 *     )
 * )
 */

class ExcluirResponse
{
}