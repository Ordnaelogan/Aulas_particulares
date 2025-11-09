<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importa o tipo de relacionamento

class Aula extends Model
{
    use HasFactory;

    /**
     * A "lista branca" de campos que podem ser salvos
     * (Conforme o seu enunciado: data, duracao, valor, e as FKs)
     */
    protected $fillable = [
        'aluno_id',
        'disciplina_id',
        'data',
        'duracao_horas',
        'valor_total',
    ];

    /**
     * Relacionamento: Uma Aula PERTENCE A um Aluno.
     * (O inverso do Aluno "hasMany" Aulas)
     */
    public function aluno(): BelongsTo
    {
        // Esta Aula "pertence a" um Aluno
        return $this->belongsTo(Aluno::class);
    }

    /**
     * Relacionamento: Uma Aula PERTENCE A uma Disciplina.
     * (O inverso da Disciplina "hasMany" Aulas)
     */
    public function disciplina(): BelongsTo
    {
        // Esta Aula "pertence a" uma Disciplina
        return $this->belongsTo(Disciplina::class);
    }
}