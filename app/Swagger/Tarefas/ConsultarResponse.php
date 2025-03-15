<?php

namespace App\Swagger\Tarefas;

/**
 * @OA\Get(
 *     path="/tarefas",
 *     summary="Listar todas as tarefas",
 *     tags={"Tarefas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="status",
 *         in="query",
 *         description="Filtrar tarefas pelo status (true para concluídas, false para pendentes)",
 *         required=false,
 *         @OA\Schema(type="boolean", example=true)
 *     ),
 *     @OA\Response(
 *         response=111,
 *         description="Lista de tarefas encontrada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="titulo", type="string", example="Desenvolver Site"),
 *                     @OA\Property(property="status", type="boolean", example=true),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example=null),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example=null)
 *                 )
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     ),
 *     @OA\Response(
 *         response=333,
 *         description="Nenhuma tarefa encontrada",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="string", example="Tarefas não foram encontradas. Tente novamente."),
 *             @OA\Property(property="codigo_resposta", type="integer", example=333)
 *         )
 *     )
 * )
 */

class ConsultarResponse
{
}