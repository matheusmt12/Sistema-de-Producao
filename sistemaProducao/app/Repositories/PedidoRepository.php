<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class PedidoRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function finalizarPedido($id)
    {

        $pedido = $this->model->find($id);
        $pedido->data_entrega_efetuada = date_create();
        $save = [
            'id' => $pedido->id,
            'data_entrega' => $pedido->data_entrega,
            'data_pedido' => $pedido->data_pedido,
            'data_entrega_efetuada' => $pedido->data_entrega_efetuada,
            'tipo_pagamento' => $pedido->tipo_pagamento,
            'id_cliente' => $pedido->id_cliente
        ];
        $pedido->update($save);
    }
}
