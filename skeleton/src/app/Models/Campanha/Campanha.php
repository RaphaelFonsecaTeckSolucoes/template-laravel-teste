<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campanha extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'idConvenio',
        'idProduto',
        'idTabulacao',
        'nome',
        'descricao',
        'validadeDias',
        'volta24h',
        'qtdAgendamentos'
    ];

    public function filtros()
    {
        return $this->hasMany(CampanhaFiltro::class, 'idCampanha');
    }

    public function atendentes()
    {
        return $this->hasMany(CampanhaAtendentes::class, 'idCampanha');
    }

    public function tabulacoes()
    {
        return $this->hasMany(CampanhaTabulacao::class, 'idCampanha');
    }

    public function leads()
    {
        return $this->hasMany(CampanhaLead::class, 'idCampanha');
    }

    public function tabulacao()
    {
        return $this->belongsTo(Tabulacao::class, 'idTabulacao');
    }
}

