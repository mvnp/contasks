<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $fillable = ['user_id', 'fantasia', 'razao', 'cnpj', 'rua', 'numero', 'completmento', 'bairro', 'cidade', 'estado', 'telefonePrincipal', 'telefoneSecundario'];
}
