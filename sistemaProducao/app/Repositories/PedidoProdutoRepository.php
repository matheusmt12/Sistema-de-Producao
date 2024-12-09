<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class PedidoProdutoRepository{


    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getPedidosProdutos($idPedido){

        return $this->model->with('produto')->where('id_pedido',$idPedido)->get();
    }

}