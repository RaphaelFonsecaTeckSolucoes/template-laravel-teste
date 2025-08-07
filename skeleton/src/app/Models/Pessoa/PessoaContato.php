<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPessoa',
        'idTipoContato',
        'contato',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }

    public function tipoContato()
    {
        return $this->belongsTo(TipoContato::class, 'idTipoContato');
    }
}
