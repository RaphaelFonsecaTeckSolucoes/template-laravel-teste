<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fundo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idEmpresa',
        'taxa'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function regras()
    {
        return $this->hasMany(FundoRegras::class, 'idFundo');
    }

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'fundos_convenios', 'idFundo', 'idConvenio');
    }
}
