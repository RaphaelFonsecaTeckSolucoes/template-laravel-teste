<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampanhaFiltro extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCampanha',
        'idFiltro'
    ];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'idCampanha');
    }

    // public function filtro()
    // {
    //     return $this->belongsTo(Filtro::class, 'idFiltro');
    // }
}

