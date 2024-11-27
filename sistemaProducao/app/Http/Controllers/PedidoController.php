<?php

namespace App\Http\Controllers;

use App\Enum\StatusPedido;
use App\Enum\TipoPagamento;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Repositories\AbstractRepository;
use App\Repositories\PedidoRepository;
use DateTime;
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
        $repositoryPedido->verificarStatus();
        $pedidos = $repositoryPedido->all('cliente');
        $dataEntrega = $pedidos[1]->data_entrega;
        $dataHoje = date_create();
        $dataHoje = date_format($dataHoje,'Y-m-d H:i');
        //if(strtotime($dataEntrega) > strtotime( $dataHoje)) dd($pedidos[1]);
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

    public function detalhes($id){

        $repository = new PedidoRepository($this->pedido);
        $pedido = $repository->byId($id, 'cliente');
        return view('Pedido/detalhe', compact('pedido'));
    }

    public function finalizar($id){
        $repository = new PedidoRepository($this->pedido);
        $pedido = $repository->byId($id,'cliente');
        $status = array_map(fn($stat) => $stat->value, StatusPedido::cases());

        $objPedido = (object)['pedido' => $pedido , 'status' => $status];
        return view('Pedido/finalizar',compact('objPedido'));
    }

    public function concluirPedido(Request $request){

        $repository = new PedidoRepository($this->pedido);
        $repository->finalizarPedido($request);
        
        return redirect()->route('Pedido.inicio');
    }
}
