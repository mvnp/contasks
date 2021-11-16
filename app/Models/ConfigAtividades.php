<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAtividades extends Model
{
    use HasFactory;

    protected $table = 'config_atividades';
    protected $fillable = ['descricao'];

    public function configTarefas()
    {
        return $this->hasMany(ConfigTarefas::class);
    }
}
