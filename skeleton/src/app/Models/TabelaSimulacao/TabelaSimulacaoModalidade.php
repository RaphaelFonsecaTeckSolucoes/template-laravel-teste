<?php

namespace App\Models\TabelaSimulacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaSimulacaoModalidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao_modalidade';
    
    protected $fillable = ['nome'];
}
