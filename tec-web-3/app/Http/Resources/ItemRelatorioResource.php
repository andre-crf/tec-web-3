<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemRelatorioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'titulo'       => $this->titulo,
            'conteudo'     => $this->conteudo,
            'ordem'        => $this->ordem,
            'created_at'   => $this->created_at->toDateTimeString(),
            'updated_at'   => $this->updated_at->toDateTimeString(),

            // Relacionamento carregado sob demanda
            'relatorio'    => new RelatorioResource($this->whenLoaded('relatorio')),
        ];
    }
}
