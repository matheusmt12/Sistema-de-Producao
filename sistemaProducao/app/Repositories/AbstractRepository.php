<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function save($request){
        
        return $this->model->create($request->all());
    }

    public function getAll(){
        return $this->model->all();
    }

    public function edit($id){
        return $this->model->find($id);
    }

}