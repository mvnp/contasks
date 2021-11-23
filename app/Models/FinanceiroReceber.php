<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceiroReceber extends Model
{
    use HasFactory;

    protected $table = 'financeiro_receber';
    protected $fillable = ['empresa_id', 'usuario_id', 'boleto_id', 'descricao', 'valor', 'emissao', 'vencimento', 'recorrente', 'periodo', 'status'];
}
