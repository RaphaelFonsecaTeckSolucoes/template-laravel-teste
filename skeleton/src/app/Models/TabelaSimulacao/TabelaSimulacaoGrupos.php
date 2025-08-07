<?php

namespace App\Models\TabelaSimulacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaSimulacaoGrupos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao_grupos';

    protected $fillable = [
        'nome'
    ];
}
