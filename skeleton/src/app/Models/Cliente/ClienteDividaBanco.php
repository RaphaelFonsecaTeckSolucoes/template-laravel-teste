<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDividaBanco extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome'
    ];

    public function dividas()
    {
        return $this->hasMany(ClienteDivida::class, 'idBanco');
    }

    public function rubricas()
    {
        return $this->hasMany(ClienteDividaRubrica::class, 'idBanco');
    }
}
