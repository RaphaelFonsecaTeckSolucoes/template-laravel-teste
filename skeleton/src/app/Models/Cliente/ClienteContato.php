<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteContato extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCliente',
        'idDadosComplementares',
        'idTipoContato',
        'contato'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function tipoContato()
    {
        return $this->belongsTo(TipoContato::class, 'idTipoContato');
    }
}
