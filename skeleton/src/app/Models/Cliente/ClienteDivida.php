<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDivida extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idConvenio',
        'idMatricula',
        'idBanco',
        'valorParcela',
        'modoCalculo',
        'taxa',
        'valorSaldo',
        'referenciaSaldo',
        'terminoContrato',
        'parcelasPagas',
        'parcelasTotal',
        'contrato',
        'vegencia',
        'status'
    ];

    public function banco()
    {
        return $this->belongsTo(ClienteDividaBanco::class, 'idBanco');
    }
}
