<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoriaController extends Controller
{
    /**
     * Lista todas as categorias disponíveis.
     */
    public function index(): AnonymousResourceCollection
    {
        return CategoriaResource::collection(Categoria::all());
    }

    /**
     * Cria uma nova categoria.
     */
    public function store(Request $request): CategoriaResource
    {
        $validated = $request->validate([
            'nome'      => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);

        return new CategoriaResource(Categoria::create($validated));
    }

    /**
     * Exibe uma categoria com seus relatórios.
     */
    public function show(Categoria $categoria): CategoriaResource
    {
        return new CategoriaResource($categoria->load('relatorios'));
    }

    /**
     * Atualiza uma categoria existente.
     */
    public function update(Request $request, Categoria $categoria): CategoriaResource
    {
        $validated = $request->validate([
            'nome'      => ['sometimes', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);

        $categoria->update($validated);

        return new CategoriaResource($categoria);
    }

    /**
     * Remove uma categoria.
     */
    public function destroy(Categoria $categoria): JsonResponse
    {
        $categoria->delete();

        return response()->json(['message' => 'Categoria removida com sucesso.']);
    }
}
