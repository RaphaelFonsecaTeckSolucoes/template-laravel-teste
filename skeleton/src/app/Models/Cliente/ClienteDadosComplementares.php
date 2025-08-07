<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDadosComplementares extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCliente',
        'idTipoDadoComplementar',
        'nome',
        'cpf',
        'dataNascimento',
        'profissao'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function tipoDadoComplementar()
    {
        return $this->belongsTo(ClienteTipoDadoComplementar::class, 'idTipoDadoComplementar');
    }
}
