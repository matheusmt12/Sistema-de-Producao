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

}