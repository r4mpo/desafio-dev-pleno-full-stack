<?php

namespace Tests\Unit\Controllers\Tarefas;

use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class TarefasCrudControllerTest extends TestCase
{
    /**
     * Cria um usuário e retorna o token de autenticação
     */
    private function getAuthToken()
    {
        // Crie um usuário usando factory
        $user = User::factory()->create();  // Supondo que você tenha um factory para usuários

        // Gere o token JWT
        $token = JWTAuth::fromUser($user);  // Usando o método da facade para gerar o token

        return $token;
    }

    public function test_store_cria_tarefa_com_sucesso()
    {
        $token = $this->getAuthToken();

        $dados = [
            'titulo' => 'Tarefa de Teste',
            'status' => true,
        ];

        $response = $this->postJson('/api/tarefas', $dados, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'codigo_resposta' => 111,
        ]);
    }

    public function test_index_retorna_lista_de_tarefas_com_sucesso()
    {
        $token = $this->getAuthToken();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ])->get('api/tarefas');


        $response->assertStatus(200);
        $response->assertJson([
            'codigo_resposta' => 111,
        ]);
    }

    public function test_show_retorna_tarefa_com_sucesso()
    {
        $token = $this->getAuthToken();

        $response = $this->getJson('/api/tarefas/1', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'codigo_resposta' => 111,
        ]);
    }

    public function test_update_atualiza_tarefa_com_sucesso()
    {
        $token = $this->getAuthToken();

        $dados = [
            'titulo' => 'Tarefa Atualizada',
            'status' => false,
        ];

        $response = $this->putJson('/api/tarefas/1', $dados, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'codigo_resposta' => 111,
        ]);
    }

    public function test_destroy_exclui_tarefa_com_sucesso()
    {
        $token = $this->getAuthToken();

        $response = $this->deleteJson('/api/tarefas/1', [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'codigo_resposta' => 111,
        ]);
    }
}
