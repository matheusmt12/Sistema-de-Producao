<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected $pedido;
    protected $cliente;

    public function __construct(Pedido $pedido, Cliente $cliente)
    {
        $this->pedido = $pedido;
        $this->cliente = $cliente;
    }

    public function index(){

        $repositoryPedido = new AbstractRepository($this->pedido);
        $pedidos = $repositoryPedido->getAll();
        return view('Pedido/index',compact('pedidos'));
    }

    public function createPedido(){

        $repository = new AbstractRepository($this->cliente);
        $clientes = $repository->getAll();
        return view('Pedido/Create',compact('clientes'));
    }

    public function save (Request $request){

    }
}
