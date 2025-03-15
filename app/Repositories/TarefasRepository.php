<?php

namespace App\Repositories;

use App\Models\Tarefas\Tarefa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TarefasRepository
{
    public function registrar_db(array $dados): Tarefa
    {
        return Tarefa::create($dados);
    }

    public function buscar_db(int $id): Tarefa
    {
        return Tarefa::findOrFail($id);
    }

    public function consultar_db(null|string $status): array
    {
        $query = Tarefa::query();

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        return $query->get()->toArray();
    }

    public function atualizar_db(array $dados, int $id): bool
    {
        return $this->buscar_db($id)->update($dados);
    }

    public function excluir_db(int $id): bool|null
    {
        return $this->buscar_db($id)->delete();
    }
}