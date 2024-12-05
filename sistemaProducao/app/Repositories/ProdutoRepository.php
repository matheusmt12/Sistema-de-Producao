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

    public function addEstoque($request){

        $produto = $this->model->find($request->input('id'));

        if(isset($produto)){
            $produto->estoque = $produto->estoque + $request->input('quantidade');
            $produto->save();
        }

    }
}