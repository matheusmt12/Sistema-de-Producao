<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class PedidoRepository extends AbstractRepository{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}