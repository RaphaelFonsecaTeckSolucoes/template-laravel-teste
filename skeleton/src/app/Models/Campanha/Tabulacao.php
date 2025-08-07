<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tabulacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'global',
        'acaoEntrada',
        'statusEntrada',
        'acaoSaida',
        'statusSaida'
    ];

    public function campanhas()
    {
        return $this->hasMany(Campanha::class, 'idTabulacao');
    }

    public function campanhaTabulacoes()
    {
        return $this->hasMany(CampanhaTabulacao::class, 'idTabulacao');
    }
}

