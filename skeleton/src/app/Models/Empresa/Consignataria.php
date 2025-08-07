<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consignataria extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'nome',
        'status',
        'banco',
        'agencia',
        'conta',
        'instituicao',
        'smtpServer',
        'smtpPort',
        'smtpUser',
        'smtpPassword',
        'smtpSecurity',
        'assinaturaEmail'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function contratos()
    {
        return $this->hasMany(ConvenioContrato::class, 'idConsignataria');
    }
}

