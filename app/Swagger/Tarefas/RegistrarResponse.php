<?php

namespace App\Swagger\Tarefas;

/**
 * @OA\Post(
 *     path="/tarefas",
 *     summary="Criar uma nova tarefa",
 *     tags={"Tarefas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="titulo", type="string", maxLength=30, example="Teste API"),
 *                 @OA\Property(property="status", type="boolean", example=false)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=111,
 *         description="Tarefa criada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="object",
 *                 @OA\Property(property="id", type="integer", example=2),
 *                 @OA\Property(property="titulo", type="string", example="Teste API"),
 *                 @OA\Property(property="status", type="boolean", example=false),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-15T00:11:16.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-15T00:11:16.000000Z")
 *             ),
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

class RegistrarResponse
{
}