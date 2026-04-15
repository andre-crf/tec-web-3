<?php

namespace App\Http\Controllers;

use App\Http\Resources\RelatorioResource;
use App\Models\Relatorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    /**
     * Lista todos os relatórios do usuário autenticado.
     */
    public function index(): AnonymousResourceCollection
    {
        $relatorios = Relatorio::with(['categoria', 'user'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return RelatorioResource::collection($relatorios);
    }

    /**
     * Cria um novo relatório.
     */
    public function store(Request $request): RelatorioResource
    {
        $validated = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'titulo'       => ['required', 'string', 'max:255'],
            'descricao'    => ['nullable', 'string'],
            'status'       => ['sometimes', 'in:rascunho,publicado,arquivado'],
        ]);

        $relatorio = Relatorio::create([
            ...$validated,
            'user_id' => Auth::id(),
        ]);

        return new RelatorioResource($relatorio->load(['categoria', 'user', 'itens']));
    }

    /**
     * Exibe um relatório específico com seus itens.
     */
    public function show(Relatorio $relatorio): RelatorioResource
    {
        $this->authorize('view', $relatorio);

        return new RelatorioResource(
            $relatorio->load(['categoria', 'user', 'itens'])
        );
    }

    /**
     * Atualiza um relatório existente.
     */
    public function update(Request $request, Relatorio $relatorio): RelatorioResource
    {
        $this->authorize('update', $relatorio);

        $validated = $request->validate([
            'categoria_id' => ['sometimes', 'exists:categorias,id'],
            'titulo'       => ['sometimes', 'string', 'max:255'],
            'descricao'    => ['nullable', 'string'],
            'status'       => ['sometimes', 'in:rascunho,publicado,arquivado'],
        ]);

        $relatorio->update($validated);

        return new RelatorioResource($relatorio->load(['categoria', 'user', 'itens']));
    }

    /**
     * Remove um relatório e seus itens (cascade).
     */
    public function destroy(Relatorio $relatorio): JsonResponse
    {
        $this->authorize('delete', $relatorio);

        $relatorio->delete();

        return response()->json(['message' => 'Relatório removido com sucesso.']);
    }
}
