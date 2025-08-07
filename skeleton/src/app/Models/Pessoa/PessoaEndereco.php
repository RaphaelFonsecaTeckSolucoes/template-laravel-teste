<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaEndereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPessoa',
        'tipoResidencia',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'pais',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
}
