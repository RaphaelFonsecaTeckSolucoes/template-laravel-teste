<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDividaRubrica extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'idBanco',
        'nome'
    ];

    public function banco()
    {
        return $this->belongsTo(ClienteDividaBanco::class, 'idBanco');
    }
}
