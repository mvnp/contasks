<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fantasia' => $this->fantasia,
            'razao' => $this->razao,
            'cnpj' => $this->cnpj,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'completmento' => $this->completmento,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'telefonePrincipal' => $this->telefonePrincipal,
            'telefoneSecundario' => $this->telefoneSecundario
        ];
    }
}
