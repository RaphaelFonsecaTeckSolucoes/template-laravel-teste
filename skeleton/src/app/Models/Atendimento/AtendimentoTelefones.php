<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtendimentoTelefone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idAtendimento',
        'idContato',
        'idTabulacaoTelefone'
    ];

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class, 'idAtendimento');
    }

    // public function contato()
    // {
    //     return $this->belongsTo(Contato::class, 'idContato');
    // }

    // public function tabulacaoTelefone()
    // {
    //     return $this->belongsTo(TabulacaoTelefone::class, 'idTabulacaoTelefone');
    // }
}

