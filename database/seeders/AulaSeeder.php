<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aula; // Importante: Traz a Model para este ficheiro

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vamos criar uma aula de teste
        Aula::create([
            'aluno_id' => 1, // O ID da 'Ana Silva'
            'disciplina_id' => 1, // O ID de 'Matemática'
            'data' => now(), // Define a data como "agora"
            'duracao_horas' => 1.50, // 1.50 = 1 hora e 30 minutos
            'valor_total' => 105.00 // (1.5h * R$70.00/h = 105.00)
        ]);

        // (Opcional) Vamos criar uma segunda aula, para o Aluno 2
        Aula::create([
            'aluno_id' => 2, // O ID do 'Bruno Costa'
            'disciplina_id' => 2, // O ID de 'Física'
            'data' => now()->addDays(1), // Define a data como "amanhã"
            'duracao_horas' => 2.00, // 2 horas
            'valor_total' => 171.00 // (2.0h * R$85.50/h = 171.00)
        ]);
    }
}