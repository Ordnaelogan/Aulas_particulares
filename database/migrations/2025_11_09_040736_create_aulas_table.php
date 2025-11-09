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
        // Cria a tabela 'aulas'
        Schema::create('aulas', function (Blueprint $table) {
            $table->id(); // id: int (automático)

            // --- Chaves Estrangeiras (FKs) ---
            // O enunciado diz: "Uma aula é ministrada para um aluno"
            $table->foreignId('aluno_id')
                  ->constrained('alunos') // Aponta para a tabela 'alunos'
                  ->cascadeOnDelete();     // Se o aluno for apagado, apaga a aula

            // O enunciado diz: "Uma aula relaciona-se a uma disciplina"
            $table->foreignId('disciplina_id')
                  ->constrained('disciplinas') // Aponta para a tabela 'disciplinas'
                  ->cascadeOnDelete();         // Se a disciplina for apagada, apaga a aula
            
            // --- Colunas do seu enunciado ---
            $table->date('data'); // data: date
            
            // 5 dígitos no total, 2 depois da vírgula (ex: 1.50 (1h 30m))
            $table->decimal('duracao_horas', 5, 2);
            
            // 8 dígitos no total, 2 depois da vírgula (para dinheiro)
            $table->decimal('valor_total', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};