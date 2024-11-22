<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryCliente;
use Illuminate\Http\Request;

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

        $cliente = $repository->edit($id);
        dd($cliente);
        return view();
    }

}
