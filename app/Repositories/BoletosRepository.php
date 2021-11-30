<?php

namespace App\Repositories;

use App\Models\FinanceiroReceber;
use App\Models\Empresas;


class BoletosRepository
{
    protected $financeiroReceber;

    public function __construct()
    {
        $this->financeiroReceber = new FinanceiroReceber;
    }
    //
    /**
     * Get all posts.
     *
     * @return Post $post
     */
    public function getAll($idDebito)
    {
        return $this->financeiroReceber::with('empresas')->find($idDebito);
        //$financeiroReceber = FinanceiroReceber::with('empresas')->findOrFail($id);
    }
}
