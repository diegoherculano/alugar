<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    protected $fillable = [
        'id_contrato',
        'valor',
        'pago',
        'data'
    ];
}
