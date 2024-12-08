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
            'status',
            'produto.*.quantidade' => [
                function ($attribute, $value, $fail) {
                    $produtoId = explode('.', $attribute)[1]; // Extrai o ID do produto
                    $produto = Produto::find($produtoId);

                    if ($produto && $produto->estoque < $value) {
                        $fail("A quantidade solicitada para o produto '{$produto->nome}' excede o estoque disponível ({$produto->estoque}).");
                    }
                }
            ],
            'produto' => [
                function($attribute,$value,$fail){
                    $existeProduto = array_filter($value,function ($produto){
                        return isset($produto['quantidade']) && $produto['id'] > 0;
                    });

                    if(empty($existeProduto)) $fail('Deve selecionar pelo menos 1 produto');
                }
            ]
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é requirido',
            'data_entrega.after_or_equal' => 'A data não pode ser menor que a data atual',
        ];
    }

    public function pedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::class,'id_pedido');
    }
}
