<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno; // Importante: Traz a Model para este ficheiro

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vamos criar um aluno de teste (ID = 1)
        Aluno::create([
            'nome' => 'Ana Silva',
            'telefone' => '21999998888',
            'email' => 'ana.silva@email.com'
        ]);

        // (Opcional) Vamos criar um segundo aluno (ID = 2)
        Aluno::create([
            'nome' => 'Bruno Costa',
            'telefone' => '21777776666',
            'email' => 'bruno.costa@email.com'
        ]);
    }
}