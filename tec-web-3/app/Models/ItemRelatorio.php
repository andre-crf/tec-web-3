<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['relatorio_id', 'titulo', 'conteudo', 'ordem'])]
class ItemRelatorio extends Model
{
    use HasFactory;

    
    public function relatorio(): BelongsTo
    {
        return $this->belongsTo(Relatorio::class);
    }
}
