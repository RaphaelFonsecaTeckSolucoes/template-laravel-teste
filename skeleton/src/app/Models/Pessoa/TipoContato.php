<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'descricao',
    ];

    public function contatos()
    {
        return $this->hasMany(PessoaContato::class, 'idTipoContato');
    }
}
