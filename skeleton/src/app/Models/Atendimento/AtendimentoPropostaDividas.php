<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtendimentoPropostaDividas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idProposta',
        'contrato',
        'prazo',
        'valorParcela',
        'valorDivida',
        'novoPrazo',
        'valorLiberacao',
        'seguro',
        'valorContrato',
        'codigoBanco'
    ];

    public function proposta()
    {
        return $this->belongsTo(AtendimentoProposta::class, 'idProposta');
    }
}

