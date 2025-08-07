<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampanhaTabulacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCampanha',
        'idTabulacao'
    ];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'idCampanha');
    }

    public function tabulacao()
    {
        return $this->belongsTo(Tabulacao::class, 'idTabulacao');
    }
}
