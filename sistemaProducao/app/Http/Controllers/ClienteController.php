<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryCliente;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ClienteController extends Controller
{
    
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function getCliente(){

        $repository = new RepositoryCliente($this->cliente);

        $clientes= $repository->getAll();

        return view('cliente/index', compact('clientes'));
        
    }


    public function createCliente(){

        return view('cliente/Create');
    }

    public function save(Request $request){

        $repository = new AbstractRepository($this->cliente);

        $repository->save($request);
        
        return redirect()->route('Cliente.inicio');
    }

    public function editCliente($id){

        $repository = new AbstractRepository($this->cliente);

        $cliente = $repository->get($id);
        return view('Cliente/edit',compact('cliente'));
    }

    public function update(Request $request){

        $repository = new AbstractRepository(($this->cliente));
        $repository->edit($request);
        return redirect()->route('Cliente.inicio');
    }

    public function delete($id){

        $repository = new AbstractRepository($this->cliente);
        $cliente = $repository->get($id);

        return view('Cliente/delete', compact('cliente'));
    }

    public function destroy(Request $request){
        $id = $request->input('id');
        $repository = new AbstractRepository($this->cliente);
        $repository->delete($id);

        return redirect()->route('Cliente.inicio');
    }
}
