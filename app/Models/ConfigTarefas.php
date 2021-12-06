<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigTarefas extends Model
{
    use HasFactory;

    protected $table = 'config_tarefas';
    protected $fillable = ['titulo', 'descricao', 'atividade_id'];

    public function configAtividades()
    {
        return $this->belongsTo(ConfigAtividades::class, 'atividade_id', 'id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefas::class, 'atividade_id', 'id');
    }
}
