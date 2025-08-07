<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpresaContatos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'idTipoContato',
        'contato'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }
}

