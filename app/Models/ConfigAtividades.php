<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAtividades extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'config_tarefas';
    protected $fillable = [
        'descricao'
    ];

    public function configTarefas()
    {
        return $this->hasMany(ConfigTarefas::class);
    }
=======

    protected $table = 'config_atividades';
    protected $fillable = ['descricao'];
>>>>>>> e891fe806676204f84157f001765362ae6c34f36
}
