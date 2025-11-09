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
        // Cria a tabela 'disciplinas'
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id(); // id: int (automático)

            // Colunas do seu enunciado:
            $table->string('nome')->unique(); // Nome da disciplina (ex: "Matemática")
            $table->integer('carga_horaria'); // Carga horária total (ex: 40 horas)
            
            // "decimal" é o tipo correto para dinheiro
            // 8 dígitos no total, 2 depois da vírgula (ex: 150.50)
            $table->decimal('valor_hora', 8, 2); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};