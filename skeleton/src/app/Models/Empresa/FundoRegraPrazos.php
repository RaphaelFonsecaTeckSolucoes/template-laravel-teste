<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundoRegraPrazo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idRegra',
        'idPrazo',
        'coeficiente'
    ];

    public function regra()
    {
        return $this->belongsTo(FundoRegras::class, 'idRegra');
    }

    public function prazo()
    {
        return $this->belongsTo(Prazo::class, 'idPrazo');
    }
}
