<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disciplina; // Importante: Traz a Model para este ficheiro

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vamos criar uma disciplina de teste (ID = 1)
        Disciplina::create([
            'nome' => 'Matemática - Ensino Médio',
            'carga_horaria' => 40,
            'valor_hora' => 70.00
        ]);

        // (Opcional) Vamos criar uma segunda disciplina (ID = 2)
        Disciplina::create([
            'nome' => 'Física - Pré-Vestibular',
            'carga_horaria' => 60,
            'valor_hora' => 85.50
        ]);
    }
}