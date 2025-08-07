<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDadosProfissionais extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCliente',
        'matriculaInstitucional',
        'matriculaPensionista',
        'empresa',
        'cnpj',
        'razaoSocial',
        'nomeFantasia',
        'setor',
        'ramoAtividade',
        'orgao',
        'tipoContrato',
        'regimeJuridico',
        'situacaoFuncional',
        'upag',
        'cargo',
        'cargoSigla',
        'remuneracao',
        'dataAdmissao',
        'senhaPortal'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
