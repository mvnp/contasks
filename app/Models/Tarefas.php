<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $table = 'tarefas';
    protected $fillable = [
        '', 'fantasia', 'razao', 'cnpj', 'rua', 'numero', 'completmento', 'bairro', 'cidade', 'estado', 'telefonePrincipal', 'telefoneSecundario'
    ];
}


$table->unsignedBigInteger('atividade_id');
$table->unsignedBigInteger('conf_tarefa_id');
$table->string("descricao");
$table->boolean("finalizado");
$table->timestamps();
