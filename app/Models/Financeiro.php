<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;

    protected $table = 'financeiro';
    protected $fillable = ['empresa_id', 'usuario_id', 'boleto_id', 'descricao', 'instrucao_rp', 'valor', 'emissao', 'vencimento', 'recorrente', 'periodo'];




}
