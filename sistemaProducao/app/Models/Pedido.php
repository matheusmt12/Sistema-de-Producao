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

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function rules()
    {

        return [
            'data_pedido' => 'required',
            'tipo_pagamento',
            'data_entrega' => 'required|after_or_equal:today',
            'data_entrega_efetuada',
            'id_cliente',
            'status'
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é requirido',
            'data_entrega.after_or_equal' => 'A data não pode ser menor que a data atual'
        ];
    }
}
