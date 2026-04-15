<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemRelatorioResource;
use App\Models\ItemRelatorio;
use App\Models\Relatorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemRelatorioController extends Controller
{
    /**
     * Lista todos os itens de um relatório específico.
     */
    public function index(Relatorio $relatorio): AnonymousResourceCollection
    {
        $this->authorize('view', $relatorio);

        return ItemRelatorioResource::collection(
            $relatorio->itens
        );
    }

    /**
     * Adiciona um novo item a um relatório.
     */
    public function store(Request $request, Relatorio $relatorio): ItemRelatorioResource
    {
        $this->authorize('update', $relatorio);

        $validated = $request->validate([
            'titulo'   => ['required', 'string', 'max:255'],
            'conteudo' => ['required', 'string'],
            'ordem'    => ['sometimes', 'integer', 'min:0'],
        ]);

        $item = $relatorio->itens()->create($validated);

        return new ItemRelatorioResource($item);
    }

    /**
     * Exibe um item específico.
     */
    public function show(Relatorio $relatorio, ItemRelatorio $item): ItemRelatorioResource
    {
        $this->authorize('view', $relatorio);

        return new ItemRelatorioResource($item->load('relatorio'));
    }

    /**
     * Atualiza um item existente.
     */
    public function update(Request $request, Relatorio $relatorio, ItemRelatorio $item): ItemRelatorioResource
    {
        $this->authorize('update', $relatorio);

        $validated = $request->validate([
            'titulo'   => ['sometimes', 'string', 'max:255'],
            'conteudo' => ['sometimes', 'string'],
            'ordem'    => ['sometimes', 'integer', 'min:0'],
        ]);

        $item->update($validated);

        return new ItemRelatorioResource($item);
    }

    /**
     * Remove um item do relatório.
     */
    public function destroy(Relatorio $relatorio, ItemRelatorio $item): JsonResponse
    {
        $this->authorize('update', $relatorio);

        $item->delete();

        return response()->json(['message' => 'Item removido com sucesso.']);
    }
}
