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

    public function finalizarPedido($request)
    {
        $pedido = $this->model->find($request->input('id'));
        if ($request->input('status') == 'ENTREGUE') {
            # code...
            $pedido->data_entrega_efetuada = date_create();
        }
        $pedido->status = $request->input('status');
        $pedido->save();
    }

    public function verificarStatus()
    {

        $listaPedido = $this->model->where('status', 'A CAMINHO')
            ->where('data_entrega', '<', date_create())->get();

        foreach($listaPedido as $p){
            $p->status = 'ATRASADO';
            $p->save();
        }
    }
}
