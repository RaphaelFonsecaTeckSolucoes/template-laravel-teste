<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegistroImportacoes extends Model
{
    use HasFactory, SoftDeletes;

    protected $filable = [
        'nomeArquivo',
        'totalLinhas',
        'totalProcessadas',
        'dataUpload',
        'url',
        'status',
        'codUser',
        'erro'
    ];
}
