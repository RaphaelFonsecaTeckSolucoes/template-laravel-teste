<?php

namespace App\Models\TabelaSimulacao;

use App\Models\TabelaSimulacao\TipoOperacao as TabelaSimulacaoTipoOperacao;
use App\Models\TipoOperacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TabelaSimulacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tabela_simulacao';

    protected $fillable = [
        'nome',
        'id_convenio',
        'id_consignataria',
        'id_fundo',
        'id_tipo_operacao',
        'id_modalidade',
        'cod_tabela',
        'autorizacao',
        'status'
    ];

    public function prazos()
    {
        return $this->hasMany(TabelaSimulacaoPrazos::class, 'id_tabela_simulacao' , 'id');
    }

    public function permissoes()
    {
        return $this->hasMany(TabelaSimulacaoPermissao::class, 'id_tabela_simulacao' , 'id')->with('idTipoPermissao');
    }

    public function idTipoOperacao()
    {
        return $this->belongsTo(TabelaSimulacaoTipoOperacao::class, 'id_tipo_operacao', 'id');
    }

    public function idModalidade()
    {
        return $this->belongsTo(TabelaSimulacaoModalidade::class , 'id_modalidade' , 'id');
    }



}

