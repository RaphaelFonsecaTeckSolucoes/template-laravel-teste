<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDocumento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idCliente',
        'idTipoDocumento',
        'urlS3',
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(ClienteTipoDocumento::class, 'idTipoDocumento');
    }
}
