<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletos extends Model
{
    use HasFactory;

    protected $table = 'boletos';
    protected $fillable = ['empresa_id', 'boleto_ref', 'boleto_link', 'emissao', 'vencimento', 'pago'];


    public function financeiroPagar()
    {
        return $this->hasOne(FinanceiroPagar::class);
    }

    public function financeiroReceber()
    {
        return $this->hasOne(FinanceiroReceber::class);
    }
}
