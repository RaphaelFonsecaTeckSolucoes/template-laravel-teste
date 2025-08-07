<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampanhaAtendentes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCampanha',
        'idPessoa'
    ];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'idCampanha');
    }

    // public function pessoa()
    // {
    //     return $this->belongsTo(Pessoa::class, 'idPessoa');
    // }
}

