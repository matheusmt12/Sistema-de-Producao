<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class FornecedorRepository extends AbstractRepository{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model= $model;
    }
}