<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cpf',
        'nome',
        'nomeSocial',
        'dataNascimento',
        'genero',
        'estadoCivil',
        'nacionalidade',
        'naturalidade',
        'ufNaturalidade',
        'rg',
        'orgaoEmissor',
        'ufOrgaoEmissor',
        'dataEmissao'
    ];

    public function contatos()
    {
        return $this->hasMany(ClienteContato::class, 'idCliente');
    }

    public function dadosBancarios()
    {
        return $this->hasMany(ClienteDadosBancario::class, 'idCliente');
    }

    public function enderecos()
    {
        return $this->hasMany(ClienteEndereco::class, 'idCliente');
    }

    public function dadosProfissionais()
    {
        return $this->hasMany(ClienteDadosProfissionais::class, 'idCliente');
    }

    public function dadosComplementares()
    {
        return $this->hasMany(ClienteDadosComplementares::class, 'idCliente');
    }

    public function documentos()
    {
        return $this->hasMany(ClienteDocumento::class, 'idCliente');
    }

    public function margens()
    {
        return $this->hasMany(ClienteMargem::class, 'idDadosProfissionais');
    }
}
