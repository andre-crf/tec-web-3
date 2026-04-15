<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelatorioResource extends JsonResource
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
            'descricao'    => $this->descricao,
            'status'       => $this->status,
            'created_at'   => $this->created_at->toDateTimeString(),
            'updated_at'   => $this->updated_at->toDateTimeString(),

            // Relacionamentos carregados sob demanda
            'user'         => new UserResource($this->whenLoaded('user')),
            'categoria'    => new CategoriaResource($this->whenLoaded('categoria')),
            'itens'        => ItemRelatorioResource::collection(
                $this->whenLoaded('itens')
            ),
        ];
    }
}
