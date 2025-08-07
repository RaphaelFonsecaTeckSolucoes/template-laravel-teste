<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nomeSocial',
        'cpf',
        'dataNascimento',
        'genero',
        'nomeMae',
        'nomePai',
    ];

    public function contatos()
    {
        return $this->hasMany(PessoaContato::class, 'idPessoa');
    }

    public function enderecos()
    {
        return $this->hasMany(PessoaEndereco::class, 'idPessoa');
    }

    public function funcionario()
    {
        return $this->hasOne(PessoaFuncionario::class, 'idPessoa');
    }
}
