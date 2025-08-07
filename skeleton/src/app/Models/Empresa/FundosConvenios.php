<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundoConvenio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idFundo',
        'idConvenio'
    ];

    public function fundo()
    {
        return $this->belongsTo(Fundo::class, 'idFundo');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'idConvenio');
    }
}

