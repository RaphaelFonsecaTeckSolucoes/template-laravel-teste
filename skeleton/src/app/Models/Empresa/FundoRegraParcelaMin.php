<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundoRegraParcelaMin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idRegra',
        'valor',
        'uf'
    ];

    public function regra()
    {
        return $this->belongsTo(FundoRegras::class, 'idRegra');
    }
}

