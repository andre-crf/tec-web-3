<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'categoria_id', 'titulo', 'descricao', 'status'])]
class Relatorio extends Model
{
    use HasFactory;

   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    
    public function itens(): HasMany
    {
        return $this->hasMany(ItemRelatorio::class)->orderBy('ordem');
    }
}
