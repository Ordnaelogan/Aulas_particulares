<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usamos $this->call() para chamar os outros seeders
        // A ORDEM É IMPORTANTE:
        // Temos que criar Alunos e Disciplinas ANTES de criar Aulas.
        
        $this->call([
            AlunoSeeder::class,
            DisciplinaSeeder::class,
            AulaSeeder::class, // Aula por último!
        ]);
    }
}