<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAtividades extends Model
{
    use HasFactory;

    protected $table = 'config_atividades';
    protected $fillable = ['titulo', 'descricao'];

    public function atividades()
    {
        return $this->hasMany(Atividades::class);
    }
}
