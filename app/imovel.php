<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imovel extends Model
{
    protected $fillable = [
        'name',
        'logradouro',
        'numero',
        'complemento',
        'valor',
        'bairro',
        'cep',
        'cidade',
        'estado'
    ];
}
