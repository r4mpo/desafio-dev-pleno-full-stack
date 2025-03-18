<?php

namespace App\Models\Infos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
    ];
}