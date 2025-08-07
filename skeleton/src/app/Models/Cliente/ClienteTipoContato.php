<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoContato extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descricao'
    ];

    public function contatos()
    {
        return $this->hasMany(ClienteContato::class, 'idTipoContato');
    }
}
