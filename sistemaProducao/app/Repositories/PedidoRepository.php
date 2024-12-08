<?php

namespace App\Repositories;

use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

        foreach ($listaPedido as $p) {
            $p->status = 'ATRASADO';
            $p->save();
        }
    }

    public function salvarPedido($request, $produtos)
    {

        try {
            DB::beginTransaction();

            $pedido = $this->save($request);

            $this->atualizarEstoque($produtos);

            $this->savePedidoProduto($produtos, $pedido->id);

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            throw $e;
        }
    }

    public function atualizarEstoque($produtos)
    {
        foreach ($produtos as $produtoData) {
            if (isset($produtoData['quantidade']) && $produtoData['id'] > 0) {
                $produto = Produto::find($produtoData['id']);
                if ($produto) {
                    $produtoNumeric = (int) $produtoData['quantidade'];
                    $produto->estoque = $produto->estoque - $produtoNumeric;
                    $produto->save();
                }
            }
        }
    }


    public function savePedidoProduto($produtos, $idPedido)
    {
        foreach ($produtos as $produto) {
            # code...
            if (isset($produto['quantidade']) && $produto['id'] > 0) {
                # code...
                PedidoProduto::create([
                    'id_pedido' => $idPedido,
                    'id_produto' => $produto['id'],
                    'quantidade' => $produto['quantidade']
                ]);
            }
        }
    }
}
