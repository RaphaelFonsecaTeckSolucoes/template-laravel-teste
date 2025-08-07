<?php

namespace App\Models\TabelaSimulacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoOperacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao_tipo_operacao';

    protected $fillable = [
        'nome'
    ];
}
