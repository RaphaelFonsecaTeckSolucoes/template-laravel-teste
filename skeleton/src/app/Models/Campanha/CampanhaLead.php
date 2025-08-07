<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampanhaLead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCampanha',
        'cpf',
        'idEquipe',
        'status'
    ];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'idCampanha');
    }

    // public function equipe()
    // {
    //     return $this->belongsTo(Equipe::class, 'idEquipe');
    // }
}

