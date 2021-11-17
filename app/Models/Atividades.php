<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividades extends Model
{
    use HasFactory;

    protected $table = 'atividades';
    protected $fillable = ['empresa_id', 'config_setor_id', 'config_ativ_id', 'descricao', 'abertura', 'fechamento', 'recorrente', 'periodo', 'finalizado'];

    public function empresas()
    {
        return $this->belongsTo(Empresas::class, 'empresa_id', 'id');
    }

    public function configSetores()
    {
        return $this->belongsTo(ConfigSetores::class, 'config_setor_id', 'id');
    }

    public function configAtividades()
    {
        return $this->belongsTo(ConfigAtividades::class, 'config_ativ_id', 'id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefas::class, 'tarefa_id', 'id');
    }
}
