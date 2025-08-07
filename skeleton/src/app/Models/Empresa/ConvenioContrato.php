<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConvenioContrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'idConsignataria',
        'dataFormalizacao',
        'dataTermino',
        'statusRenovacao',
        'uf',
        'custoConvenioPorcentagem',
        'custoImplantacao',
        'custoAverbacao',
        'dataPrimeiroVencimento',
        'custoAverbacaoPorcentagem',
        'status'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function consignataria()
    {
        return $this->belongsTo(Consignataria::class, 'idConsignataria');
    }
}
