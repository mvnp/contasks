<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAtividades extends Model
{
    use HasFactory;

    protected $table = 'config_atividades';
<<<<<<< HEAD
    protected $fillable = [
        'descricao'
    ];
=======
    protected $fillable = ['descricao'];
>>>>>>> ee3b3fd1c6b22a460cf1f0bf1c013b581e353f55

    public function configTarefas()
    {
        return $this->hasMany(ConfigTarefas::class, 'atividade_id', 'id');
    }
}
