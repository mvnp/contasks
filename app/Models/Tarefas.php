<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;

    protected $table = 'tarefas';
    protected $fillable = [
        'atividade_id', 'conf_tarefa_id', 'descricao', 'finalizado'
    ];

    public function atividades()
    {
        return $this->belongsTo(Atividades::class, 'atividade_id', 'id');
    }

    public function configTarefas()
    {
        return $this->belongsTo(configTarefas::class, 'Conf_tarefa_id', 'id');
    }
}
