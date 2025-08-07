<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'cpf',
        'idCampanha',
        'idAtendente',
        'idTabulacao'
    ];

    // public function empresa()
    // {
    //     return $this->belongsTo(Empresa::class, 'idEmpresa');
    // }

    // public function campanha()
    // {
    //     return $this->belongsTo(Campanha::class, 'idCampanha');
    // }

    public function atendente()
    {
        return $this->belongsTo(Pessoa::class, 'idAtendente');
    }

    // public function tabulacao()
    // {
    //     return $this->belongsTo(Tabulacao::class, 'idTabulacao');
    // }

    public function telefones()
    {
        return $this->hasMany(AtendimentoTelefone::class, 'idAtendimento');
    }

    public function propostas()
    {
        return $this->hasMany(AtendimentoProposta::class, 'atendimento');
    }
}

