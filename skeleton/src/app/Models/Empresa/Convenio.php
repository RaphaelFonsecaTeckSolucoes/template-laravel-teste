<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convenio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'nome',
        'qtdCaracteres',
        'dataFechamentoFolha',
        'dataRepasse',
        'sistemaConsignante',
        'representante',
        'site'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function fundos()
    {
        return $this->belongsToMany(Fundo::class, 'fundos_convenios', 'idConvenio', 'idFundo');
    }
}
