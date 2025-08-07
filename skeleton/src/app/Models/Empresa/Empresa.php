<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cnpj',
        'razaoSocial',
        'nomeFantasia'
    ];

    public function contatos()
    {
        return $this->hasMany(EmpresaContatos::class, 'idEmpresa');
    }

    public function enderecos()
    {
        return $this->hasMany(EmpresaEnderecos::class, 'idEmpresa');
    }

    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'idEmpresa');
    }

    public function consignatarias()
    {
        return $this->hasMany(Consignataria::class, 'idEmpresa');
    }

    public function contratos()
    {
        return $this->hasMany(ConvenioContrato::class, 'idEmpresa');
    }

    public function fundos()
    {
        return $this->hasMany(Fundo::class, 'idEmpresa');
    }
}
