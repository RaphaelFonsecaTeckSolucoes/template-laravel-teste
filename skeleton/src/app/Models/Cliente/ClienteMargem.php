<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteMargem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idDadosProfissionais',
        'idTipoMargem',
        'valor'
    ];

    public function dadosProfissionais()
    {
        return $this->belongsTo(ClienteDadosProfissionais::class, 'idDadosProfissionais');
    }

    public function tipoMargem()
    {
        return $this->belongsTo(TipoMargem::class, 'idTipoMargem');
    }
}
