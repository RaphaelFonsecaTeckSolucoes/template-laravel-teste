<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDadosBancario extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCliente',
        'tipoConta',
        'banco',
        'codigoBanco',
        'agencia',
        'conta'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
