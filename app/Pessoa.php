<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'telefone', 'password', 'nacionalidade',
        'estadoCivil', 'profissao', 'logradouro', 'numero',
        'bairro', 'cep', 'cidade', 'estado', 'rg'
    ];
}
