<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMargem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descricao'
    ];

    public function margens()
    {
        return $this->hasMany(ClienteMargem::class, 'idTipoMargem');
    }
}
