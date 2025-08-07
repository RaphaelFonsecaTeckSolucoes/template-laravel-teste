<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prazo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'prazo'
    ];

    public function regras()
    {
        return $this->belongsToMany(FundoRegras::class, 'fundo_regra_prazos', 'idPrazo', 'idRegra');
    }
}

