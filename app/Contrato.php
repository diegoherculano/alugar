<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'id_imovel',
        'id_pessoa',
        'vencimento',
        'prazo'
    ];
}
