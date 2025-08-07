<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtendimentoProposta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'atendimento',
        'tabela',
        'consignataria',
        'convenio',
        'fundo',
        'coeficiente',
        'taxa',
        'autorizacaoTabela',
        'comentario',
        'perculio',
        'tipoOperacao',
        'tac',
        'valorTotalContratado'
    ];

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class, 'atendimento');
    }

    public function dividas()
    {
        return $this->hasMany(AtendimentoPropostaDividas::class, 'idProposta');
    }
}

