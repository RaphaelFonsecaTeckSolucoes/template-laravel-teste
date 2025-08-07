<?php

namespace App\Models\TabelaSimulacao;

use App\Models\TabelaSimulacao;
use App\Models\TabelaSimulacao\TabelaSimulacao as TabelaSimulacaoTabelaSimulacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaSimulacaoPermissao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao_permissao';

    protected $fillable = [
        'id_tabela_simulacao',
        'id_tipo_permissao',
        'permissao',
    ];

    public function tabelaSimulacao()
    {
        return $this->belongsTo(TabelaSimulacaoTabelaSimulacao::class, 'id_tabela_simulacao');
    }

    public function idTipoPermissao()
    {
        return $this->belongsTo(TabelaSimulacaoTipoPermissao::class, 'id_tipo_permissao');
    }
}
