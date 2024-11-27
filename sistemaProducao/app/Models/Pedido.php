<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_pedido',
        'tipo_pagamento',
        'data_entrega',
        'data_entrega_efetuada',
        'id_cliente',
        'status'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }
}
