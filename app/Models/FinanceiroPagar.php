<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceiroPagar extends Model
{
    use HasFactory;

    protected $table = 'financeiro_pagar';
    protected $fillable = ['empresa_id', 'usuario_id', 'boleto_id', 'descricao', 'valor', 'emissao', 'vencimento', 'recorrente', 'periodo', 'status'];


    public function empresas()
    {
        return $this->belongsTo(Empresas::class);
    }

    public function boleto()
    {
        return $this->hasOne(Boletos::class);
    }
}
