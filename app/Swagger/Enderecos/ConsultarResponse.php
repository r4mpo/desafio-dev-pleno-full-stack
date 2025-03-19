<?php

namespace App\Swagger\Enderecos;

/**
 * @OA\Get(
 *     path="/enderecos",
 *     summary="Consultar endereço do usuário",
 *     tags={"Endereços"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Endereço encontrado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="object",
 *                 @OA\Property(property="id", type="integer", example=2),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="cep", type="string", example="13183135"),
 *                 @OA\Property(property="logradouro", type="string", example="Rua Capitão Gancho"),
 *                 @OA\Property(property="bairro", type="string", example="Campos Marítimos"),
 *                 @OA\Property(property="cidade", type="string", example="Vila Velha EDIT"),
 *                 @OA\Property(property="estado", type="string", example="MG"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-18T23:38:45.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-18T23:39:45.000000Z")
 *             ),
 *             @OA\Property(property="codigo_resposta", type="integer", example=111)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Endereço não encontrado",
 *         @OA\JsonContent(
 *             @OA\Property(property="resposta", type="string", example="Endereços não foram encontrados. Tente novamente."),
 *             @OA\Property(property="codigo_resposta", type="integer", example=333)
 *         )
 *     )
 * )
 */

class ConsultarResponse
{
}