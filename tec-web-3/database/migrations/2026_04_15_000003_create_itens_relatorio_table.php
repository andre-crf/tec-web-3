<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itens_relatorio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('relatorio_id')
                ->constrained('relatorios')
                ->cascadeOnDelete();
            $table->string('titulo');
            $table->text('conteudo');
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_relatorio');
    }
};
