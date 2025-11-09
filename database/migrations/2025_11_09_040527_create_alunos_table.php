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
        // Cria a tabela 'alunos'
        Schema::create('alunos', function (Blueprint $table) {
            $table->id(); // id: int (automático)

            // Colunas do seu enunciado:
            $table->string('nome');
            $table->string('telefone', 20)->nullable(); // Telefone pode ser opcional
            $table->string('email')->unique(); // Email deve ser único

            $table->timestamps(); // (created_at e updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};