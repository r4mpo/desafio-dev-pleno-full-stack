<?php

namespace App\Swagger\Tarefas;

/**
 * @OA\Get(
 *     path="/tarefas/{id}",
 *     summary="Exibir uma tarefa específica",
 *     tags={"Tarefas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID da tarefa a ser exibida",
 *         required=true,
 *         @OA\Schema(type="string", example="2")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Tarefa encontrada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="object",
 *                 @OA\Property(property="id", type="integer", example=2),
 *                 @OA\Property(property="titulo", type="string", example="Teste API Atualizado"),
 *                 @OA\Property(property="status", type="boolean", example=true),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-15T00:11:16.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-15T01:07:38.000000Z")
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Tarefa não encontrada",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="array",
 *                 @OA\Items(type="string", example="No query results for model [App\\Models\\Tarefas\\Tarefa] 1")
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=333)
 *         )
 *     )
 * )
 */

class BuscarResponse
{
}