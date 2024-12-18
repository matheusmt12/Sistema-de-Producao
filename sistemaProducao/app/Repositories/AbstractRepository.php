<?php 

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function save($request){
        
        return $this->model->create($request->all());
    }

    public function all($modelo){
        return $this->model->with($modelo)->get();
    }

    public function getPaginate($modelo){
        return $this->model->with($modelo)->paginate(5);
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getAllPaginate(){
        return $this->model->paginate(5);
    }
    public function edit($request){
        $modelo = $this->model->find($request->input('id'));
        $modelo->update($request->all());
    }

    public function get($id){

        return $this->model->find($id);
    }

    public function delete($id){
        $cliente = $this->model->find($id);
        $cliente->delete($cliente);
    }

    public function byId($id, $modelo){
        return $this->model->with($modelo)->find($id);
    }

}