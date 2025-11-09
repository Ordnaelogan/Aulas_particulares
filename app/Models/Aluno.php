<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importa o tipo de relacionamento

class Aluno extends Model
{
    use HasFactory;

    /**
     * A "lista branca" de campos que podem ser salvos
     * (Conforme o seu enunciado: nome, telefone, email)
     */
    protected $fillable = [
        'nome',
        'telefone',
        'email',
    ];

    /**
     * Relacionamento: Um Aluno TEM MUITAS Aulas
     * (Conforme o seu enunciado: "Um aluno pode ter várias aulas")
     */
    public function aulas(): HasMany
    {
        // Este Aluno "tem muitas" Aulas
        return $this->hasMany(Aula::class);
    }
}