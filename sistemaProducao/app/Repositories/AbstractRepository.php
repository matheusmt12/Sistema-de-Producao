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

    public function getAll(){
        return $this->model->all();
    }

    public function edit($request){
        $cliente = $this->model->find($request->input('id'));
        $cliente->update($request->all());
    }

    public function get($id){

        return $this->model->find($id);
    }

    public function delete($id){
        $cliente = $this->model->find($id);
        $cliente->delete($cliente);
    }

}