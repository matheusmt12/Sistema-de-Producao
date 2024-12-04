<?php
namespace App\Repositories;

use App\Models\PedidoProduto;
use Illuminate\Database\Eloquent\Model;

class PedidoProdutoRepository{


    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function savePedido($produtos, $idPedido){


        foreach ($produtos as $produto) {
            # code...
            if (isset($produto['quantidade']) && $produto['id'] > 0) {
                # code...
                $this->model->create([
                    'id_pedido' => $idPedido,
                    'id_produto' => $produto['id']
                ]);
            }
        }
    }

}