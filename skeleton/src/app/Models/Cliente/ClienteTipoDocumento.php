<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteTipoDocumento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descricao'
    ];

    public function documentos()
    {
        return $this->hasMany(ClienteDocumento::class, 'idTipoDocumento');
    }
}
