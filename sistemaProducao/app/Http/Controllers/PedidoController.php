<?php

namespace App\Http\Controllers;

use App\Enum\TipoPagamento;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Repositories\PedidoRepository;
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

        $repositoryPedido = new PedidoRepository($this->pedido);
        $pedidos = $repositoryPedido->all('cliente');
        return view('Pedido/index',compact('pedidos'));
    }

    public function createPedido(){

        $repository = new PedidoRepository($this->cliente);
        $tipos = array_map(fn($tipo) => $tipo->value, TipoPagamento::cases());
        $clientes = $repository->getAll();
        $dados = (object)['clientes' => $clientes , 'tipos' => $tipos];
        return view('Pedido/Create',compact('dados'));
    }

    public function save (Request $request){

        $repository = new PedidoRepository($this->pedido);
        $repository->save($request);

        return redirect()->route('Pedido.inicio');
    }
}
