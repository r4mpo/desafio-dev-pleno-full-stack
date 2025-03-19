<?php

namespace App\Repositories;

use App\Models\Infos\Endereco;

class EnderecosRepository
{
    public function consultar_db()
    {
        return Endereco::query()->where('user_id', auth()->user()->id)->first();
    }

    public function atualizar_db(array $dados)
    {
        $endereco = $this->consultar_db();

        if(empty($endereco)){
            return $this->registrar_db($dados);
        }

        return $endereco->update($dados);
    }

    private function registrar_db(array $dados): Endereco
    {
        $dados['user_id'] = auth()->user()->id;
        return Endereco::create($dados);
    }
}