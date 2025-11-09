<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importa o tipo de relacionamento

class Disciplina extends Model
{
    use HasFactory;

    /**
     * A "lista branca" de campos que podem ser salvos
     * (Conforme o seu enunciado: nome, carga_horaria, valor_hora)
     */
    protected $fillable = [
        'nome',
        'carga_horaria',
        'valor_hora',
    ];

    /**
     * Relacionamento: Uma Disciplina TEM MUITAS Aulas
     * (Conforme o seu enunciado: "Uma disciplina é ministrada em várias aulas")
     */
    public function aulas(): HasMany
    {
        // Esta Disciplina "tem muitas" Aulas
        return $this->hasMany(Aula::class);
    }
}