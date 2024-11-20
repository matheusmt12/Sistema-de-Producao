<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function save($request){
        
        return $this->model->create($request);
    }

    public function getAll(){
        return $this->model->all();
    }

}