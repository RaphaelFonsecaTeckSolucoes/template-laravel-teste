<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaFuncionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPessoa',
        'idEmpresa',
        'idSetor',
        'idCargo',
        'matricula',
        'salario',
        'tipoContrato',
        'dataAdmissao',
        'dataDemissao',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
}
