<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

class ProdutoRepository extends AbstractRepository{
    

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function atualizarEstoque($produtos){
        foreach($produtos as $produtoData){

            if(isset($produtoData['quantidade']) && $produtoData['id'] > 0){
                $produto = $this->model->find($produtoData['id']);
                if ($produto) {
                    # code...
                    $produtoNumeric = (integer) $produtoData['quantidade'];
                    $produto->estoque = $produto->estoque - $produtoNumeric;

                    $produto->save();
                }
            }
    
        }
    }
}