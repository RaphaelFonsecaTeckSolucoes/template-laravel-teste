<?php

namespace App\Models\TabelaSimulacao;

use App\Models\TabelaSimulacao;
use App\Models\TabelaSimulacao\TabelaSimulacao as TabelaSimulacaoTabelaSimulacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaSimulacaoPrazos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao_prazos';

    protected $fillable = [
        'id_tabela_simulacao',
        'prazo',
        'fator',
        'tda',
        'taxa',
        'comissao_parceiro',
        'comissao_especial'
    ];

    public function tabelaSimulacao()
    {
        return $this->belongsTo(TabelaSimulacaoTabelaSimulacao::class, 'id_tabela_simulacao');
    }
}

