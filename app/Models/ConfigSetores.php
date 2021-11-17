<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSetores extends Model
{
    use HasFactory;

    protected $table = 'config_setores';
    protected $fillable = ['titulo', 'descricao'];


    public function atividades()
    {
        return $this->hasMany(Atividades::class);
    }
}
