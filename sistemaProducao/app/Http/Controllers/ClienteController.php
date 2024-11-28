<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\AbstractRepository;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function index(){

        $repository = new ClienteRepository($this->cliente);

        $clientes = $repository->getAll();
        return view('cliente/index', compact('clientes'));
        
    }


    public function createCliente(){

        return view('cliente/Create');
    }

    public function save(Request $request){

        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $repository = new ClienteRepository($this->cliente);

        $repository->save($request);
        
        return redirect()->route('Cliente.inicio');
    }

    public function editCliente($id){

        $repository = new ClienteRepository($this->cliente);

        $cliente = $repository->get($id);
        return view('Cliente/edit',compact('cliente'));
    }

    public function update(Request $request){

        $repository = new ClienteRepository(($this->cliente));
        $repository->edit($request);
        return redirect()->route('Cliente.inicio');
    }

    public function delete($id){

        $repository = new ClienteRepository($this->cliente);
        $cliente = $repository->get($id);

        return view('Cliente/delete', compact('cliente'));
    }

    public function destroy(Request $request){
        $id = $request->input('id');
        $repository = new ClienteRepository($this->cliente);
        $repository->delete($id);

        return redirect()->route('Cliente.inicio');
    }

    public function detalhe($id){

        $repository = new ClienteRepository($this->cliente);        
        $cliente = $repository->get($id);   
        
        return view('Cliente/detalhes',compact('cliente'));
    }
}
