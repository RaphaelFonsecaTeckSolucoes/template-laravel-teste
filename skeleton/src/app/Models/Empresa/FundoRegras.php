<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundoRegras extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idFundo',
        'idAmbito',
        'valorMaxCessao',
        'idadeMin',
        'idadeMax'
    ];

    public function fundo()
    {
        return $this->belongsTo(Fundo::class, 'idFundo');
    }

    public function prazos()
    {
        return $this->belongsToMany(Prazo::class, 'fundo_regra_prazos', 'idRegra', 'idPrazo');
    }

    public function parcelasMin()
    {
        return $this->hasMany(FundoRegraParcelaMin::class, 'idRegra');
    }
}
