<?php

namespace App\Models\Tarefas;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo', 'status'];
}
